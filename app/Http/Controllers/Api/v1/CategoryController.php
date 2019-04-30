<?php

namespace App\Http\Controllers\Api\v1;


use App\Model\Category;
use App\Transformers\CategoryTransformer;

class CategoryController extends ApiBaseController
{
    public function index()
    {
        //分类数据是集合，所以我们使用 $this->response->collection 返回数据。
        return $this->response->collection(Category::all(),new CategoryTransformer());
    }
}
