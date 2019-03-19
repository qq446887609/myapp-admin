<?php
/**
 * Created by summer winds.
 * Date: 2019/3/19
 * Time: 下午3:17
 * Desc:
 */

namespace App\Transformers;

/**
 * transform 返回用户数据格式规定
 */

use App\Model\ImageModel;
use League\Fractal\TransformerAbstract;

class BannerTransformer extends TransformerAbstract
{
    public function transform(ImageModel $imageModel)
    {
        return [
            "id"=>$imageModel->id,
            "title"=>$imageModel->title,
            "img_url"=>$imageModel->img_url,
            "url"=>$imageModel->url,
            "sort"=>$imageModel->sort
        ];
    }
}