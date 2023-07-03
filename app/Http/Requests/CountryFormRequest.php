<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryFormRequest extends FormRequest
{
    protected $table ='country';
    
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
        $nameCondi = 'bail|required|between: 1,50|unique:'.$this->table.',name';
        $statusCondi = 'bail|required|in:active,inactive';
        $displayCondi = 'bail|required|in:yes,no';
        if(!empty($id)){
            $nameCondi .=','.$this->id;
            $thumbCondi = 'bail|image|max:2048';
        }
        return [
            'name' => $nameCondi,
            'status' => $statusCondi, 
            'display' => $displayCondi, 
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'in' => ':attribute phải được chọn',
            'unique' => ':attribute không được trùng lặp',
            'between' => ':attribute phải nằm trong khoảng 1-50 ký tự'
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'status'  => 'Trạng thái',
            'display'  => 'Trạng thái hiển thị',
        ];
    }
}
