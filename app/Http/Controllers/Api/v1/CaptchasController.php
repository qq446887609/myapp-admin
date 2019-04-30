<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;

class CaptchasController extends ApiBaseController
{
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);
        $phone = $request->phone;

        $captcha = $captchaBuilder->build();
        $expiredAt = now()->addMinutes(2);//缓存时间
        \Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expiredAt);

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),//过期时间格式化
            'captcha_image_content' => $captcha->inline()  //验证码图片
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
