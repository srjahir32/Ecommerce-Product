<?php



namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Route, URL, Mail;

use Session;



class LoginregisterController extends Controller

{



    public function index(){

        return view('admin.pages.login');

    }



    public function login(Request $request){

        $input = request()->all();

        $data = [

            'email' => $input['email'],

            'password' => $input['password'],

        ];

        $request = Request::create(url('/api/login'), 'POST', $data);

        $res = app()->handle($request);

        $response = json_decode($res->getContent(), true);

        if($response['status'] != '0') {

            $token = $response['success']['token'];

            $user = $response['user'];

            session()->put('token', $token);

            session()->put('user', $user);

        }   

       

        // return $response;   

        return response()->json(['data' =>$response]);

    }



    public function careteuser(){

        return view('admin.pages.signup');

    }

    

    public function storeuser(Request $request){

        $input = request()->all();

       

       $data = [

        'first_name' => $input['first_name'],

        'last_name' => $input['last_name'],

        'email' => $input['email'],

        'password' => $input['password'],

        'c_password' => $input['c_password'],

    ];

 

    $request = Request::create(url('/api/register'), 'POST', $data);

    $res = app()->handle($request);

    $response = json_decode($res->getContent(), true);

    // return $response;

    if($response['success']['status'] == "0"){

        return response()->json(['data' =>$response]);

    }

    if($response['success']['status'] == "1"){

        $to_email = $input['email'];

        $to_name = "Ecommerce Product";

        $data = array('name' => $input['first_name']);



        Mail::send('email.signup', $data, function ($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)

                ->subject('Ecommerce Product');

            $message->from('payfull@emrahduman.com', 'Ecommerce Product');

            

        });

        // return response()->json(['success' => ' Great! Successfully send mail']);

    }

        return response()->json(['data' =>$response]);   

   }



   public function edituserprofile(Request $request){

    $input = request()->all();

    $user_id = session()->get('user')['id']; 

    $data = [

        'first_name' => $input['first_name'],

        'last_name' => $input['last_name'],

        'user_id' =>$user_id

    ];

    $Bearer_token = session()->get('token');        

    $request = Request::create(url('/api/edituser'), 'POST', $data);

    $request->headers->set('Accept', 'application/json');

    $request->headers->set('Authorization', 'Bearer '.$Bearer_token);

    $res = app()->handle($request);

    $response = json_decode($res->getContent(), true);

        return response()->json(['data' =>$response]);   

    }



   

public function forgetpassword(){

    return view('admin.pages.forgetpassword');

}

public function createpasswordlink(Request $request){

    $input = $request->all();

    $data = [

        'email' => $input['email']

    ];

    $request = Request::create(url('/api/forgot_password'), 'POST', $data);

    $res = app()->handle($request);

    $response = json_decode($res->getContent(), true);

    if($response['status'] == "1"){

        $to_email = $input['email'];

        $to_name = "Forget Password";

        $data = array('token' => $response['data']);



        Mail::send('email.forgetpassword', $data, function ($message) use ($to_name, $to_email) {

            $message->to($to_email, $to_name)

                ->subject('Forget Password');

            $message->from('payfull@emrahduman.com', 'Forget Password');

            

        });

        // return response()->json(['success' => ' Great! Successfully send mail']);

    }

    return response()->json(['data' =>$response]);   



   

}



public function resetpassword($token){

    return view('admin.pages.resetpassword', compact('token'));

}

public function updatepassword(Request $request){

    $input = $request->all();

    // return $input;



    $data = [

        'password_reset_token' => $input['token'],

        'new_password' => $input['new_password'],

        'confirm_new_password' => $input['confirm_new_password']

    ];

  

    $request = Request::create(url('/api/reset_password'), 'POST', $data);

    $res = app()->handle($request);

    $response = json_decode($res->getContent(), true);

    return response()->json(['data' =>$response]);   

    

}

   public function logout(){

        Session::flush();

        Auth::logout();

        return Redirect('login');

   }

   public function userdetail(){

    $Bearer_token = session()->get('token');        

    $request = Request::create(url('/api/user_details'), 'POST');

    $request->headers->set('Accept', 'application/json');

    $request->headers->set('Authorization', 'Bearer '.$Bearer_token);

    $res = app()->handle($request);

    $response = json_decode($res->getContent(), true);

        return response()->json(['data' =>$response]); 
    }

}