<?php

namespace App\Http\Requests\Api\v1;

use Dingo\Api\Http\FormRequest;//注意这里的 FormRequest 是 DingoApi 为我们提供的基类

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 你可以确认用户是否真的通过了授权，以便更新指定数据
     * @return bool
     */
    public function authorize()
    {
        //如果 authorize 方法返回 false，则会自动返回一个 HTTP 响应，其中包含 403 状态码，而你的控制器方法也将不会被运行。
        //
        //如果你打算在应用程序的其它部分处理授权逻辑，只需从 authorize 方法返回 true
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:july_users,name',
            'password' => 'required|string|min:6',
            'verification_key' => 'required|string',
            'verification_code' => 'required|string',
        ];
    }

    /**
     * 自定义错误消息
     */
    public function messages()
    {
        return [
            'name.required'=>'昵称不能为空',
            'name.between' =>'昵称长度为3到25位',
            'name.regex'   =>'昵称格式正确',
            'user.unique'  => '昵称已经注册',
            'password.required' => '密码不能为空',
            'password.string'   => '密码格式不正确',
            'verification_code' => '验证码不能为空'
        ];
    }

}
