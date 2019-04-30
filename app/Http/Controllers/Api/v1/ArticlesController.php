<?php

namespace App\Http\Controllers\Api\v1;

use App\Model\Articles;
use App\Transformers\ArticlesTransformer;
use Illuminate\Http\Request;

class ArticlesController extends ApiBaseController
{
    /**
     * 文章列表
     * @param Request $request
     * @param Articles $articles
     * @return \Dingo\Api\Http\Response
     */
    public function index(Request $request,Articles $articles)
    {
        $where = logic\Articles::getArticleListWhere($request);

        //构建了一个查询构造器 query()
        $query = $articles->query();

        $query->where($where);

        $query->orderBy("created_at","desc");

        $articles = $query->paginate(8);

        return $this->response->paginator($articles,new ArticlesTransformer());
    }

    /**
     * 文章详情
     */
    public function show($id,Articles $articles)
    {
        $articles = $articles->where("id",$id)->first();

        return $this->response->item($articles,new ArticlesTransformer());
    }
}
