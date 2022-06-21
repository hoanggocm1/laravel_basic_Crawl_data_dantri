<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFormRequestProduct extends FormRequest
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
            'name' => 'required',
            'file' => 'required',
            'menu_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'price_sale' => 'required',

            'content' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên san pham',
            'file.required' => 'Bac buoc phai nhap hinh anh',
            'menu_id.required' => 'Hiện tại không có danh mục nào hoạt động. Không thể thêm sản phẩm!',

            'description.required' => 'Vui lòng nhập chi tiet ',
            'price.required' => 'vui long nhap gia',
            'price_sale.required' => 'vui long nhap gia giam',
            'content.required' => 'Vui lòng nhập mo ta ',
        ];
    }
}
