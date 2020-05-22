<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;

class DashboardController extends Controller
{
    private $user_id;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // return view('admin.pages.dashboard');

        $Bearer_token = session()->get('token');
        $request = Request::create(url('/api/user_details'), 'POST');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $Bearer_token);
        $res = app()->handle($request);
        $response = json_decode($res->getContent());
        $this->user_id = json_decode($res->getContent(), true)['success']['id'];
        // return $this->user_id;
        // return response()->json(['data' =>$response ]);
        return view('admin.pages.dashboard', compact('response'));

    }
    public function store(Request $request)
    {
        $image = $request->file('file');
        $imagename = $image->getClientOriginalName();
        $imageFileType = $image->getClientOriginalExtension();
        $milliseconds = round(microtime(true) * 1000);
        $imagestorename = $milliseconds . "." . $imageFileType;
        $image->move(public_path('images'), $imagestorename);

        return response()->json(['success' => $imagestorename]);
    }

    public function test()
    {
        //    $data = array(
        //       array('user_id'=>'1', 'name'=> json_encode(array("puja","test"))),
        //       array('user_id'=>'1', 'name'=> json_encode(array("puja1","test1"))),
        //   );

        //    DB::table("tests")->insert($data);

        $array1 = array(
            'short',
            'tall',
        );
        $array2 = array(
            'smart',
            'stupid',
        );
        $array3 = array();

        foreach ($array1 as $key1) {
            foreach ($array2 as $key2) {
                $array3[] = array($key1 . ' ' . $key2);
            }
        }

        return(count($array3));

    }
}
