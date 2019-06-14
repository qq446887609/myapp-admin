<?php
/**
 * Created by summer winds.
 * Date: 2019/4/30
 * Time: 上午10:45
 * Desc:
 */

namespace App\Transformers;


use App\Model\Bookshelf;
use League\Fractal\TransformerAbstract;

class BookshelfTransformer extends TransformerAbstract
{
    public function transform(Bookshelf $bookshelf)
    {
        return [
            "id"=>$bookshelf->id,
            "zhuishu_id"=>$bookshelf->zhuishu_id,
            "biquge_id"=>$bookshelf->biquge_id,
            "book_name"=>$bookshelf->book_name,
            "cover_url"=>$bookshelf->cover_url,
        ];
    }
}