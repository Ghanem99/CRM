<?php

namespace Crm\Customer\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Crm\Base\Requests\ApiRequest;

class CreateCustomerRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3', 
        ];
    }
}
