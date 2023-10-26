<?php 

namespace Crm\User\Requests;

use Crm\Base\Requests\ApiRequest;

class UserCreationRequest extends ApiRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ];
    }
}