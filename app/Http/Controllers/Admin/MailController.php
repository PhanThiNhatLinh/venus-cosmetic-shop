<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function sendMail(){
        $params = [
            'key' => 'value',
        ];
        Mail::to('nhatlinhphan9999@gmail.com')->send(new DemoMail($params));
    }
}
