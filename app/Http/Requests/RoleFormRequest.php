<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
{
    protected $table ='roles';
    
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
   
    public function rules(): array
    {
        $id = $this->id;
        $nameCondi = 'bail|required|between: 5,200|unique:'.$this->table.',name';
        $descriptionCondi = 'bail|required|between: 5,200';

        if(!empty($id)){
            $nameCondi .=','.$this->id;
            $descriptionCondi = 'bail|required|between: 5,200';
        }

        return [
            'name' => $nameCondi,
            'description' => $descriptionCondi,
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute không được trùng lặp',
            'between' => ':attribute phải nằm trong khoảng 5-200 ký tự'
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'description'  => 'Mô tả',
        ];
    }
}
