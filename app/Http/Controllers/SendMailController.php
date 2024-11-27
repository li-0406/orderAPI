<?php

use App\Mail\FirstMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class sendMailController extends Controller{
    public function sendMail()
    {
        Mail::to('example@test.com')->send(new FirstMail('這是一封測試郵件的內容'));
        return response()->json(['message' => '郵件發送成功']);
    }
}