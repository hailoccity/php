<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use const http\Client\Curl\Features\HTTP2;

class AdminController extends Controller
{
    // create AdminController
    public function index(){
        $admin = new Admin();

//        DB::table('admins')->insert([
//           'username'=>'Hung',
//           'password'=>Hash::make('123456') ,
//        ]);
        $user = DB::table('admins')->get();

        return $user;
//        dd($user);
    }
    public function store(Request $request){

        return Admin::create([
            'username'=> $request['username'],
            'password'=> Hash::make($request['password']),
        ]);
    }
    public function delete($id){
        $user = Admin::find($id);
        if (is_null($user)){
            return response()->json([
                'message'=>'Not Found User',
            ]);
        }
        $user->delete();
        return response()->json([
            "message"=>"Deleted username {$user->username}",
        ]);
    }
    public function show($id){
        $user = Admin::find($id);
        if (is_null($user)){
            return response()->json([
               'message'=> 'Not Found user'
            ]);
        }
        return $user;
    }
    public function edit(Request $request, $id){
        $user = Admin::find($id);
        if (is_null($user)){
            return 'Not Found User';
        }
        $user->username = $request['username'];
        $user->password = Hash::make($request['password']);
        $user->save();
        return response()->json([
            'message'=> "Update Successfully",
            'data' => $user,
        ]);
    }
}
