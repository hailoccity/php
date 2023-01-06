<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $data = [
            'subject'=>'Hieu LD',
            'body'=>'Happy New Year'
        ];
        try {
            Mail::to('ledoanhieu1997@gmail.com')->send(new SendEmail($data));
            return response()->json(['Successfully']);
        } catch (Exception $exception){
            return response()->json(['Error']);
        }
    }
}
