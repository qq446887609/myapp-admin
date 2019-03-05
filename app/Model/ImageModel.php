<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    //
    protected $table = "july_image";

    public function add($data)
    {
        return self::insert($data);
    }
}
