<?php


namespace App\Http\Controllers;


use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function store(Request $request){
        return Teacher::create([
            'name'=> $request['name'],
            'email'=> $request['email'],
            'active'=>$request['active'],
            'password'=> Hash::make($request['password']),
        ]);
    }
}
