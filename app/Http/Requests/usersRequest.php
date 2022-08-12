<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usersRequest extends FormRequest
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
            'email' => 'required|min:6|max:40|email',
            'name' => 'required|min:6|max:15',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bắt buộc nhập Tên',
            'name.min' =>'email Tối thiểu 6 ký tự',
            'name.max' =>'email Tối đa 15 ký tự',
            'email.required' => 'Bắt buộc nhập email',
            'email.min' =>'email Tối thiểu 6 ký tự',
            'email.max' =>'email Tối đa 40 ký tự',
            'email.email' => 'Email không đúng định dạng',

        ]; 
    }
}
