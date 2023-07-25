<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionFormRequest extends FormRequest
{
    protected $table ='permission';
    
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
        $permission_name = 'bail|required';
        $permission_area = 'bail|required';
        if(!empty($id)){
            $nameCondi .=','.$this->id;
            $descriptionCondi = 'bail|required|between: 5,200';
            $permission_name = 'bail|required';
            $permission_area = 'bail|required';
        }
        return [
            'name' => $nameCondi,
            'description' => $descriptionCondi,
            'permission_name' => $permission_name,
            'permission_area' => $permission_area,
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
            'permission_name' => 'Phạm Vi Phân Quyền',
            'permission_area' => 'Tên Quyền',
        ];
    }
}
