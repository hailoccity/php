<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Resource\UserResource;

class UserController extends Controller
{
    public function index(){
        return UserResource::collection(User::all());
    }
}
