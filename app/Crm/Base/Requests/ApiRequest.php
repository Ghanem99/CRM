<?php

namespace Crm\Base\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize(): bool;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    abstract public function rules(): array;

    protected function failedValidation(Validator $validator): void
    {
        $errors = (new ValidationException($validator))->errors(); // list of all errors

        if(! empty($errors)) {
            $error = array_shift($errors)[0]; // first error
        } else {
            $error = 'Validation error';
        }
        
        throw new HttpResponseException(
            response()->json(
                [
                    'status' => 'error',
                    'message' => $error
                ], 
                JsonResponse::HTTP_BAD_REQUEST
            )
        );
    }
}
