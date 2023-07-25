<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogFormRequest extends FormRequest
{
    protected $table ='blog';
    
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
        $thumbCondi = 'bail|required|image|max:2048';
        $contentCondi = 'bail|required|min:100';
        $statusCondi = 'bail|required|in:active,inactive';
        $displayCondi = 'bail|required|in:yes,no';
        if(!empty($id)){
            $nameCondi .=','.$this->id;
            $descriptionCondi = 'bail|between: 5,200';
            $thumbCondi = 'bail|image|max:2048';
            $contentCondi = 'bail|min:100';
            $statusCondi = 'bail|in:active,inactive';
            $displayCondi = 'bail|in:yes,no';
        }
        return [
            'name' => $nameCondi,
            'description' => $descriptionCondi,
            'thumb' => $thumbCondi,
            'content' => $contentCondi, 
            'status' => $statusCondi, 
            'display' => $displayCondi, 
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'in' => ':attribute phải được chọn',
            'image'=> ':attribute phải có đuôi là jpg, jpeg, png, bmp, gif, svg, or webp',
            'max'=> ':attribute không được vượt quá',
            'unique' => ':attribute không được trùng lặp',
            'between' => ':attribute phải nằm trong khoảng 5-200 ký tự'
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'description'  => 'Mô tả',
            'content'  => 'Nội dung bài viết',
            'status'  => 'Trạng thái',
            'display'  => 'Trạng thái hiển thị',
            'thumb'  => 'Hình ảnh',
        ];
    }
}
