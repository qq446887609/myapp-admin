<?php
/**
 * 发送验证码api
 */

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\VerificationCodeRequest;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $captchaData = \Cache::get($request->captcha_key);

        if(!$captchaData) {
            return $this->response->error('图片验证码已失效',422);
        }

        if(!hash_equals($captchaData['code'],$request->captcha_code)) {
            //验证码错误,清空验证码
            \Cache::forget($request->captcha_key);
            return $this->response->error('验证码错误',401);
        }

        $phone = $captchaData['phone'];

        //生成4位随机数,左侧补0
        $code = str_pad(random_int(1,9999),4,0,STR_PAD_LEFT);

        try{
            $easySms->send($phone, [
                'template' => 'SMS_143717573',
                'data' => [
                    'code' => $code
                ],
            ]);

        }catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $e){

            $message = $e->getException('aliyun')->getMessage();     // 返回指定网关名称的异常对象

            return $this->response->errorInternal($message?:'短信发送异常');
        }

        $key = 'verificationCode_'.str_random(15);//生成key

        $expiredAt = now()->addMinutes(10);//添加缓存过期时间

        \Cache::put($key,['phone'=>$phone,'code'=>$code],$expiredAt);

        return $this->response->array([
            'key'=>$key,
            'expired_at'=>$expiredAt->toDateTimeString(),
        ])->setStatusCode(201);
    }
}
