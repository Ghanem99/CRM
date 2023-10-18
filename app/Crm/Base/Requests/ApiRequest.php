<?php

namespace Crm\Base;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

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
        $errors = new ValidationErrors($validator->errors());
        if(!empty($errors->getErrors())) {
            $transformedErrors = [];

            foreach($errors->getErrors() as $key => $value) {
                $transformedErrors[] = [
                    'field' => $key,
                    'message' => $value[0]
                ]; 
            }

            throw new \HttpResponseException(response()->json([
                'errors' => $transformedErrors
            ], HttpResponse::BadRequest));
        }
    }
}