<?php
namespace App\Transformers;

/**
 * transform 返回用户数据格式规定
 */

use App\Model\Images;
use League\Fractal\TransformerAbstract;

class ImagesTransformer extends TransformerAbstract{

    public function transform(Images $images)
    {
        return [
          'id' => $images->id,
          'user_id' => $images->user_id,
          'type' => $images->type,
          'path' => $images->path,
          'created_at' => $images->created_at->toDateTimeString(),
          'updated_at' => $images->updated_at->toDateTimeString(),
        ];
    }
}
?>