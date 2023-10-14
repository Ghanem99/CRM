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

    public function store(Request $request) 
    {
        $user = new User();
        $user->username = $request->get('username');
        $user->password = $request->get('password');
        $user->save();
    }

    public function update(Request $request) 
    {
        $id = $request->get('id');
        $user = User::find($id);
        $user->username = $request->get('username');
        $user->password = $request->get('password');
        $user->save();
    }

    public function destroy(Request $request) 
    {
        $id = $request->get('id');
        $user = User::find($id);
        $user->delete();
    }
}