<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'price' => 'required|min:1|',
            'name' => 'required|min:6|max:15',
            'email' => 'required|min:6|max:15|email',
            'description' =>'required|min:50'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập Tên',
            'name.min' =>'Tên Tối thiểu 6 ký tự',
            'name.max' =>'tên Tối đa 15 ký tự',
            'price.required' => 'Bắt buộc nhập gia',
            'price.min' =>'Giá phải lớn hơn 1',
            'description.required' => 'Bắt buộc nhập mmô tả',
            'description.min' =>'mô tả Tối thiểu 50 ký tự',
            'email.required' => 'Bắt buộc nhập Tên',
            'email.min' =>'Tên Tối thiểu 6 ký tự',
            'email.max' =>'tên Tối đa 15 ký tự',
        
        ]; 
    }
}
