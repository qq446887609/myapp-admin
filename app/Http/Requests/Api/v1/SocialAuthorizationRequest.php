<?php

namespace App\Http\Requests\Api\v1;

use Dingo\Api\Http\FormRequest;

class SocialAuthorizationRequest extends FormRequest
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
        $rules = [
            'code' => 'required_without:access_token|string',//验证字段只有当任一指定字段不存在的情况下才是必须的
            'access_token' => 'required_without:code|string'//验证字段只有当任一指定字段不存在的情况下才是必须的
        ];

        //客户端要么提交授权码（code），要么提交 access_token 和 openid
        if($this->social_type == 'weixin' && !$this->code) {
            $rules['openid'] = 'required|string';
        }

        return $rules;
    }
}
