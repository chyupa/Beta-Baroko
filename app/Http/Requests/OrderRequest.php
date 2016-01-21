<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OrderRequest
 * @package App\Http\Requests
 */
class OrderRequest extends FormRequest
{
    /**
     * Check if the user is authorized to make this request
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Define validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
          'email' => 'required|email',
          'name' => 'required|min:3',
          'number' => 'required|numeric',
          'city' => 'required',
          'phone' => [
              'required',
              'regex:/^(?:(?:(?:00\s?|\+)40\s?|0)(?:7\d{2}\s?\d{3}\s?\d{3}|(21|31)\d{1}\s?\d{3}\s?\d{3}|((2|3)[3-7]\d{1})\s?\d{3}\s?\d{3}|(8|9)0\d{1}\s?\d{3}\s?\d{3}))$/'
          ],
          'street' => 'required',
          'county' => 'required'
        ];
    }
}