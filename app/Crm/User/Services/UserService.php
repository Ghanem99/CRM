<?php 

namespace Crm\User\Services;

use Illuminate\Support\Facades\Hash;        
use Crm\User\Models\User;
use Crm\User\Events\UserCreationEvent;
use Crm\User\Requests\UserCreationRequest;


class UserService
{
    const TOKEN_NAME = "personal_access";
    public function store(UserCreationRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password );
        $user->save();
        
        // event(new UserCreationEvent($user));

        // return a response with a token
        return response()->json([
            'user' => $user,
            'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken
        ], 201);

    }
}