<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class UserFormRequest extends FormRequest
{
    protected $table ='users';
    
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
        $task = $this->task ;
        $nameCondi = '';
        $statusCondi = '';
        $levelCondi = '';
        $phoneCondi = '';
        $thumbCondi = '';
        $addressCondi = '';
        $passwordCondi = '';
        $date_of_birthCondi = '';
        switch ($task) {
            case 'add':
                // $nameCondi = 'bail|required|between: 5,100|unique:'.$this->table.',name';
                $statusCondi = 'bail|required|in:active,inactive';
                // $levelCondi = 'bail|required|in:super_admin,admin,user';
                $phoneCondi = 'bail|numeric|regex:/^\+[84]{1}[0-9]{3,11}$/|unique:'.$this->table.',phone';
                $date_of_birthCondi = 'bail|date|before:'.Carbon::now()->subYears(15);
                $thumbCondi = 'bail|image|max:2048';
                $addressCondi = 'bail|string|between: 1,100';
                $passwordCondi = 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
                break;
            case 'edit_info':
                $nameCondi = 'bail|required|between:5,100';
                $thumbCondi = 'bail|image|max:2048';
                $statusCondi = 'bail|in:active,inactive';
                $date_of_birthCondi = 'bail|date|before:'.Carbon::now()->subYears(15);
                $phoneCondi = 'bail|numeric|regex:/^\+[84]{1}[0-9]{3,11}$/|unique:'.$this->table.',phone,'.$this->id;
                $addressCondi = 'bail|string|between: 1,100';
                break;
            case 'change_password':
                $passwordCondi = 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
                break;
            default:
                break;
        }


        
        // if(!empty($id)){
        //     $nameCondi .=','.$this->id;
        //     $thumbCondi = 'bail|image|max:2048';
        //     $statusCondi = 'bail|in:active,inactive';
        //     $levelCondi = 'bail|in:super_admin,admin,user';
        //     $phoneCondi = 'numeric';
        //     $addressCondi = 'bail|string|between: 1,100';
        //     $passwordCondi = 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
        // }
        return [
            'name' => $nameCondi,
            'status' => $statusCondi, 
            'level' => $levelCondi, 
            'birthday' => $date_of_birthCondi, 
            'phone' => $phoneCondi, 
            'thumb' => $thumbCondi, 
            'address' => $addressCondi, 
            'password' => $passwordCondi,
        ];
    }    
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'in' => ':attribute phải được chọn',
            'unique' => ':attribute không được trùng lặp',
            'between' => ':attribute phải nằm trong khoảng 1-50 ký tự',
            'min' => ':attribute ít nhất phải có :min ký tự',
            'numeric' => ':attribute phải là số',
            'image' => ':attribute Phải đúng định dạng hình ảnh',
            'string' => ':attribute Phải là kí tự',
            'confirmed' => ':attribute Xác Minh phải trùng với mật khẩu',
            'regex' => ':attribute phải đúng quy tắc',
            'before' => ':attribute phải lớn hơn 15 tuổi', 
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'status'  => 'Trạng thái',
            'thumb'  => 'Hình ảnh',
            'level' => 'Vai trò', 
            'phone' => 'Số điện thoại', 
            'address' => 'Địa chỉ', 
            'password' => 'Mật Khẩu',
            'birthday' => 'Ngày tháng năm sinh',
        ];
    }
}
