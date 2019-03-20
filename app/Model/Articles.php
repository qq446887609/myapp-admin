<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = "july_articles";

    /**
     * 类似tp5获取器
     */
    public function getTagAttribute($value)
    {
        return  explode(',',$value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date("Y-m-d/H:i",strtotime($value));
    }
}
