<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:2',
            'description' => 'required|max:255|min:2',
            'price'=> 'max:10|min:3'
        ];
    }

    function messages()
    {
        $messages = [
            'name.required'=> 'Không được bỏ trống',
            'name.max'=>'Không được dài quá 255 ký tự',
            'name.min'=> 'Độ dài trên 2 ký tự',
            'description.required'=> 'Mô tả không được bỏ trống',
            'description.max'=> 'Mô tả không được quá 255 ký tự',
            'description.min' =>'Độ dài trên 2 ký tự',
            'price.max' =>' số tiền k quá 1 tỉ',
            'price.min'=>'so tien'
        ];
        return $messages;
    }
}
