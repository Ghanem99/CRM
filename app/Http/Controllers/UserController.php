<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crm\User\Services\UserService;

use Crm\User\Requests\UserCreationRequest;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return $this->userService->index();
    }

    public function show($id)
    {
        return $this->userService->show($id);
    }

    public function store(UserCreationRequest $request)
    {
        return $this->userService->store($request);
    }
}
