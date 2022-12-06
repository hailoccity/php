<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use App\Imports\AdminImport;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function index(){
        $user = DB::table('admins')->get();
        return $user;
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
    public function import(Request $request){
        Excel::import(new AdminImport, $request->file('file')->store('import'));
        return response()->json([
            "message" => "Import Successfully !"
        ]);
    }
    public function export(){
        return Excel::download(new AdminExport,'test.csv');
    }

}
