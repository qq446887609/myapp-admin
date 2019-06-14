<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            "zhuishu_id"=>'required',
            "book_name"=>'required',
            "cover_url"=>'required'
        ];
    }

    public function messages()
    {
        return [
            "zhuishu_id.required"=>'追书神器图书id不能为空',
            "book_name.required"=>'书籍名称不能为空',
            "cover_url.required"=>'图书封面图片不能为空'
        ];
    }
}
