<?php
namespace App\Http\Controllers;

class CSRFController extends Controller
{
    public function getCSRFController() #Request Object
    {
        return csrf_token();
    }
}