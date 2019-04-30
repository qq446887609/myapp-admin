<?php

namespace App\Http\Controllers\Api\v1;

use App\Model\Bookshelf;
use App\Transformers\BookshelfTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends ApiBaseController
{
    /**
     * 返回用户书架信息
     */
    public function bookshelf(Request $request)
    {
        $user = $this->user();
        $list = Bookshelf::where("user_id","=",$user->id)->where("status","!=",DELETE_STATUS)->get();

        //书架信息是集合 所以我们使用$this->response->collection
        return $this->response->collection($list,new BookshelfTransformer());
    }
}
