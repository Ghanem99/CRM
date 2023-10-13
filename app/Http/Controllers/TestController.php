<?php 

namespace App\Http\Controllers;

class TestController extends Controller 
{

    public function index() 
    {
        echo "Hello Again!";
    }

    public function home()
    {
        return view('home');
    }
}