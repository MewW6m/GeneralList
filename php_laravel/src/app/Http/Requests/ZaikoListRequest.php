<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZaikoListRequest extends FormRequest
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
            //
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400, 
            'errors' => $validator->errors(),
        ], 400); 

        throw new HttpResponseException($response);
    }
}
