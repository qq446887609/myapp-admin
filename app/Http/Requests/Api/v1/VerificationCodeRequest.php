<?php
/**
 * api 发送短信 验证类
 */

namespace App\Http\Requests\Api\v1;

use Dingo\Api\Http\FormRequest;//注意这里的 FormRequest 是 DingoApi 为我们提供的基类

class VerificationCodeRequest extends FormRequest
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
            'captcha_key' => 'required|string',//图片验证码key
            'captcha_code' => 'required|string',//图片验证码code
        ];
    }
}
