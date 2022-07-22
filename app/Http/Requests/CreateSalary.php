<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSalary extends FormRequest
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
            'work' => 'required|max:20',
            'workingDate' => 'required|date',
            'salary' => 'required|numeric',
        ];
    }

    public function attributes(){
        return [
            'work' => '仕事内容',
            'workingDate' => '稼働日',
            'salary' => '給与',
        ];
    }
}
