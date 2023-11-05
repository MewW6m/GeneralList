<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        if ($this->isMethod('get')) {
            return [
                'id' => 'integer',
                'status' => 'string',
                'itemName' => 'string',
                'itemCode' => 'integer',
                'sort' => 'string',
                'order' => 'string',
                'page' => 'integer',
            ];
        }
    }
    
    /**
     * バリデーションが失敗した場合に呼び出されます。
     *
     * @param Validator $validator バリデータ
     * @return void
     * @throws HttpResponseException レスポンス例外
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 400, 
            'errors' => $validator->errors(),
        ], 400); 

        throw new HttpResponseException($response);
    }
}
