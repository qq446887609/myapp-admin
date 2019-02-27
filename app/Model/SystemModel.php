<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemModel extends Model
{
    //
    protected $table = 'system';

    public function getSys()
    {
        return self::first()->toArray();
    }
}
