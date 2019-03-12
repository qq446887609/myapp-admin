<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['type','path'];

    public function user()
    {
        //属于用户
        return $this->belongsTo(User::class);
    }
}
