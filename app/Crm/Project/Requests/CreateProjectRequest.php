<?php

namespace Crm\Project\Requests;

use Crm\Base\Requests\ApiRequest;

class CreateProjectRequest extends ApiRequest 
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|numeric|max:255',
            'customer_id' => 'required|integer',
            'cost' => 'required|numeric',
        ];
    }
}