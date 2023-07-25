<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    protected $table ='product';
    
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
        $priceCondi = 'bail|required|min:4';
        $discountCondi = 'bail|min:1';
        $stockCondi = 'bail|required|min:0';
        $codeCondi = 'bail|between: 3,10 |unique:'.$this->table.',code';
        $descriptionCondi = 'bail|required|between: 5,2000';
        $thumbCondi = 'required';
        $thumbCondi2 = 'image|max:2048';
        $expiry_dateCondi = 'bail|required|date';
        $id_countryCondi = 'required';
        $id_brandCondi = 'required';
        $id_categoryCondi = 'required';
        $statusCondi = 'bail|required|in:active,inactive';
        $displayCondi = 'bail|required|in:yes,no';
        if(!empty($id)){
            $nameCondi .=','.$this->id;
            $codeCondi .=','.$this->id;
            $thumbCondi ='';
            $thumbCondi2 = 'image|max:2048';
        }
        return [
            'name' => $nameCondi,
            'price' => $priceCondi,
            'discount' =>$discountCondi,
            'stock' =>$stockCondi,
            'code' =>$codeCondi,
            'expiry_date' =>$expiry_dateCondi,
            'id_country' =>$id_countryCondi,
            'id_brand' =>$id_brandCondi,
            'id_category' =>$id_categoryCondi,
            'description' => $descriptionCondi,
            'thumb' => $thumbCondi,
            'thumb.*' => $thumbCondi2,
            'status' => $statusCondi, 
            'display' => $displayCondi, 
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn :min',
            'in' => ':attribute phải được chọn',
            'image'=> ':attribute phải có đuôi là jpg, jpeg, png, bmp, gif, svg or webp',
            'max'=> ':attribute không được vượt quá',
            'unique' => ':attribute không được trùng lặp',
            'between' => ':attribute phải nằm trong khoảng 5-2000 ký tự',
            'date' => ':attribute phải là định dạng thời gian',
        ];
    }
    public function attributes(): array
    {
        return [
            'name' => 'Tên',
            'description'  => 'Mô tả',
            'price'  => 'Giá cả',
            'discount'  => 'Phần trăm khuyến mại',
            'status'  => 'Trạng thái',
            'display'  => 'Trạng thái hiển thị',
            'thumb'  => 'Hình ảnh',
            'stock' =>'Số lượng sản phẩm',
            'code' =>'Mã sản phẩm',
            'expiry_date' =>'Ngày hết hạn sản phẩm',
            'id_country' =>'Xuất Xứ',
            'id_brand' =>'Thương Hiệu',
            'id_category' =>'Danh mục sản phẩm',
            'thumb.*'=> 'Hình ảnh tải lên'
        ];
    }
}
