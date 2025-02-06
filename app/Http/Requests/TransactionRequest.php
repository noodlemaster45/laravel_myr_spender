<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TransactionRequest extends FormRequest
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
            "amount" =>'required|numeric',
            "type" =>"required|numeric|between:1,3"
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            "status" => "false",
            "message" => "Validation error",
            "data" => $validator->errors(),
        ]));
        
    }
    public function messages()  {
        return [
            "amount.required" =>'required amount',
            "amount.numeric" =>'amounts must be in numbers',
            "type.required" =>"required type of transaction",
            "type.numeric" =>"transaction type must be in numbers"

        ];
    }
    
}
