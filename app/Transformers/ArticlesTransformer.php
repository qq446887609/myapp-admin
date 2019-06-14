<?php
/**
 * Created by summer winds.
 * Date: 2019/3/20
 * Time: 上午9:46
 * Desc:
 */

namespace App\Transformers;


use App\Model\Articles;
use League\Fractal\TransformerAbstract;

class ArticlesTransformer extends TransformerAbstract
{
    public function transform(Articles $articles)
    {
        return [
            "id"   => $articles->id,
            "title" => $articles->title,
            "description" => $articles->description,
            "content"    => $articles->content,
            "created_at" => $articles->created_at,
            "cover_url"  => $articles->cover_url,
            "tag"       => $articles->tag
        ];
    }
}