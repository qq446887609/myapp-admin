<?php
namespace App\Transformers;

/**
 * transform 返回用户数据格式规定
 */

use App\Model\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract{

    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'desc' => $category->desc
        ];
    }

}
?>