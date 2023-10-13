<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller 
{

    public function index(Request $request) 
    {
        // return $request()->all();
        // return $request->get('name', null)

        // $id = $request->get('id');
        // return User::find($id);
    }

    // public function index()
    // {
    //     return request()->all();
    // }
}