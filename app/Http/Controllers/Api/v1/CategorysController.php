<?php

namespace App\Http\Controllers\Api\v1;


use App\Model\Categorys;
use App\Transformers\CategorysTransformer;

class CategorysController extends Controller
{
    public function index()
    {
        //分类数据是集合，所以我们使用 $this->response->collection 返回数据。
        return $this->response->collection(Categorys::all(),new CategorysTransformer());
    }
}
