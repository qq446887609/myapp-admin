<?php
namespace App\Transformers;

/**
 * transform 返回用户数据格式规定
 */

use App\User;
use League\Fractal\TransformerAbstract;

Class UserTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     *
     * 使用起来很简单，只需要给transformer 方法传入一个模型实例，然后返回一个数据即可，这个数组就是返回给客户端的响应数据。
     * UserTransformer 是可以复用的，当前用户信息，发布话题用户信息，话题回复用户信息都可以用这一个transformer，这样我们所有的有关 用户 的资源都会返回相同的信息，客户端只需要解析一遍即可。因为是可复用的，特别需要注意一些敏感信息，如用户手机，微信的union_id等，我们可以使用另外的字段返回。
     *   bound_phone是否绑定手机
     *   bound_wechat是否绑定微信
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'bind_phone' => $user->phone ? true : false,
            'bind_weixin' => ($user->weixin_openid || $user->weixin_unionid) ? true : false,
            'created_at' =>$user->created_at->toDateTimeString(),
            'updated_at' =>$user->updated_at->toDateTimeString()
        ];
    }
}
