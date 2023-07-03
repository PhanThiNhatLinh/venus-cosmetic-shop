<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
{
    protected $table ='slider';
    
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
        $nameCondi = 'bail|required|between: 5,100|unique:'.$this->table.',name';
        $descriptionCondi = 'bail|required|between: 5,200';
        $thumbCondi = 'bail|required|image|max:2048';
        $linkCondi = 'bail|required|min:5|url';
        $statusCondi = 'bail|required|in:active,inactive';
        $displayCondi = 'bail|required|in:yes,no';
        if(!empty($id)){
            $nameCondi .=','.$this->id;
            $thumbCondi = 'bail|image|max:2048';
        }
        return [
            'name' => $nameCondi,
            'description' => $descriptionCondi,
            'thumb' => $thumbCondi,
            'link' => $linkCondi, 
            'status' => $statusCondi, 
            'display' => $displayCondi, 
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min kí tự',
            'url' => ':attribute chưa đúng định dạng url',
            'in' => ':attribute phải được chọn',
            'image'=> ':attribute phải có đuôi là jpg, jpeg, png, bmp, gif, svg, or webp',
            'max'=> ':attribute không được vượt quá',
            'unique' => ':attribute không được trùng lặp',
            'between' => ':attribute phải nằm trong khoảng 5-10 ký tự'
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'description'  => 'Mô tả',
            'link'  => 'Đường dẫn link',
            'status'  => 'Trạng thái',
            'display'  => 'Trạng thái hiển thị',
            'thumb'  => 'Hình ảnh',
        ];
    }
}
