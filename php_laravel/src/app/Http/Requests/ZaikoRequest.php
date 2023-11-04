<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ZaikoRequest extends FormRequest
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
        if ($this->isMethod('get') || $this->isMethod('delete')) {
            return [
                'id' => 'required|integer'
            ];
        }
        if ($this->isMethod('post') || $this->isMethod('patch')) {
            return [
                'id' => 'required|integer',
                'status' => 'required|string',
                'itemCode' => 'required|integer',
                'enable' => 'required|integer|min:0|max:1',
            ];
        }
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
