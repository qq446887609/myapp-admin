<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends  Model
{
    protected $table = 'july_users';

    //你的模型上定义一个 fillable 或 guarded 属性，因为所有的 Eloquent 模型都针对批量赋值（Mass-Assignment）做了保护。
    //
    //当用户通过 HTTP 请求传入了非预期的参数，并借助这些参数更改了数据库中你并不打算要更改的字段，这时就会出现批量赋值（Mass-Assignment）漏洞。例如，恶意     用户可能会通过 HTTP 请求发送 is_admin 参数，然后对应到你模型的 create 方法，此操作能让该用户把自己升级为一个管理者。
    //
    //所以，在开始之前，你应该定义好哪些模型属性是可以被批量赋值的。你可以在模型上使用 $fillable
    protected $fillable = ['name', 'phone', 'email', 'password',
        'weixin_openid', 'weixin_unionid'];

}