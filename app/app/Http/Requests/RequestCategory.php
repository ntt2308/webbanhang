<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
    public function rules()
    {
        return [
            'name' =>'required|unique:category,c_name,'.$this->id,
            // 'icon' =>'required'

        ];
    }
    public function messages()
    {
        return[
            'name.required' =>'Trường này không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            // 'icon.required' =>'Trường này không được để trống',
        ];
    }
}
