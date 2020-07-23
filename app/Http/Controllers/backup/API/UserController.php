<?php



namespace App\Http\Controllers\API;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User; 

use Illuminate\Support\Facades\Auth; 

use Validator;

use Illuminate\Support\Str;



class UserController extends Controller

{

    public $successStatus = 200;



    // 1. user login

    public function login(Request $request) {

        $validator = Validator::make($request->all(), [

            'email' => 'required|email',

            'password' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(['error'=>$validator->errors(), 'status'=>'0'], 401);

        } else {

            if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){

                $user = Auth::user();

                $success['token'] = $user->createToken('MyApp')-> accessToken;

                return response()->json(['success' => $success, 'user' => $user, 'status'=>'1'], $this-> successStatus);

            } else {

                return response()->json(['data'=>'Invalid Login details', 'status'=>'0'], 401);

            }

        }

    }



    // 2. user register

    public function register(Request $request) { 

        $validator = Validator::make($request->all(), [ 

            'first_name' => 'required', 

            'last_name' => 'required', 

            'email' => 'required|email|unique:users', 

            'password' => 'required|min:6', 

            'c_password' => 'required|same:password', 

        ],

        [

            'c_password.required' => 'The confirm password field is required.',

            'c_password.same' => 'The confirm password and password must match.',

        ]);

        if ($validator->fails()) { 
            $success['status'] = "0";
            return response()->json(['error'=>$validator->errors(), 'success'=>$success], 401);            

        }

        $input = $request->all(); 

        $input['password'] = bcrypt($input['password']); 

        $user = User::create($input); 

        $success['token'] =  $user->createToken('MyApp')-> accessToken; 

        $success['name'] =  $user->first_name." ".$user->last_name;

        $success['status'] = "1";

        return response()->json(['success'=>$success], $this-> successStatus);

    }



    // 3. user logout

    public function logout() {

        $user = Auth::user()->token();

        $user->revoke();

        return response()->json(['success' => 'Successfully logged out'], $this-> successStatus);

    }



    // 4. user details

    public function userdetails() { 

        $user = Auth::user(); 

        return response()->json(['success' => $user], $this-> successStatus); 

    } 



    // 5. user edit

    public function edituser(Request $request) { 

        $validator = Validator::make($request->all(), [ 

            'user_id' => 'required',

            'first_name' => 'required', 

            'last_name' => 'required', 

            'email' => 'required|email', 

        ]);

        if ($validator->fails()) { 

            return response()->json(['error'=>$validator->errors()], 401);            

        }

        $user_id = $request->input('user_id');

        $first_name = $request->input('first_name');

        $last_name = $request->input('last_name');

        $email = $request->input('email');

        $edit_user = User::where('id', $user_id)->update(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email]); 

        if ($edit_user != 1) {

            return response()->json(['message'=>'fail', 'status'=>'0']);

        }

        else {

            return response()->json(['message'=>'success', 'status'=>'1']);

        }

    }



    public function addpayment(Request $request) {

        $validator = Validator::make($request->all(), [ 

            'user_id' => 'required',

            'merchant_name' => 'required', 

            'merchant_password' => 'required',  

        ]);

        if ($validator->fails()) { 

            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            

        }

        $user_id = $request->input('user_id');

        $merchant_name = $request->input('merchant_name');

        $merchant_password = $request->input('merchant_password');

        $add_payment = User::where('id', $user_id)->update(['merchant_name' => $merchant_name, 'merchant_password' => $merchant_password]); 

        if ($add_payment != 1) {

            return response()->json(['message'=>'fail', 'status'=>'0']);

        }

        else {

            return response()->json(['message'=>'success', 'status'=>'1']);

        }

    }



    public function forgot_password(Request $request) {

        $validator = Validator::make($request->all(), [

        'email' => 'required|email',

        ]);

        $email = $request->input('email');

        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors(), 'status' => '0', 'data' => []]);

        } else {

        

            $user = User::where('email', $email)->get();

            if ($user->isEmpty()) {

            return response()->json(['message' => 'User does not exist', 'status' => '0', 'data' => []]);

            }

            $token = str::random(30);

            User::where('email', $email)->update(['password_reset_token' => $token]);

            

            $link = url('api/password/reset/' . $token);

            return response()->json(['message' => 'success', 'status' => '1', 'data' => $token]);

        }

    }

    

    public function reset_password(Request $request) {

        $validator = Validator::make($request->all(), [ 

            'password_reset_token' => 'required',

            'new_password' => 'required|min:6', 

            'confirm_new_password' => 'required|same:new_password', 

        ]);

        if ($validator->fails()) { 

            return response()->json(['error'=>$validator->errors(), 'status'=>'0', 'data'=>[]]);            

        } else {

            $token = $request->input('password_reset_token');

            $user = User::where('password_reset_token', $token)->get();

            if ($user->isEmpty()) {

                return response()->json(['message'=>'User does not exist', 'status'=>'0', 'data'=>[]]);

            }



            $password = bcrypt($request->input('new_password'));



            $password_reset = User::where('password_reset_token', $token)->update(['password' => $password, 'password_reset_token' => '']); 

            if ($password_reset != 1) {

                return response()->json(['message'=>'fail', 'status'=>'0']);

            }

            else {

                return response()->json(['message'=>'success', 'status'=>'1']);

            }

        }

        

    }

}

