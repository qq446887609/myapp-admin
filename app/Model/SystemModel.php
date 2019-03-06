<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemModel extends Model
{
    //
    protected $table = 'july_system';

    public function getSys()
    {
        $sys = self::first();

        if($sys)
        {
            return $sys->toArray();
        }
    }

    /**
     * 更新系统设置
     */
    public function setSys($data)
    {
        return self::where('id',$data['id'])->update($data);
    }
}
