<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) #Request Object
    {
        $name = $request->query('sayMyName', 'Heisenberg'); //第二個參數為預設字串
        
        return "Hello, $name~~";
    }
}