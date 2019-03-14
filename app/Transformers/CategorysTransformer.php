<?php
namespace App\Transformers;

use App\Model\Categorys;
use League\Fractal\TransformerAbstract;

class CategorysTransformer extends TransformerAbstract{

    public function transform(Categorys $categorys)
    {
        return [
            'id' => $categorys->id,
            'name' => $categorys->name,
            'desc' => $categorys->desc
        ];
    }

}
?>