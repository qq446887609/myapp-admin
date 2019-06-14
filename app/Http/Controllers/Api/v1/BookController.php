<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\BookRequest;
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

    /**
     * 添加图书到书架
     * @params $bookRequest 请求参数
     * @params $bookshelf 书架model
     */
    public function bookAdd(BookRequest $bookRequest,Bookshelf $bookshelf)
    {
        $user = $this->user();
        $bookName = $bookRequest->book_name;

        //curl 获得笔趣阁搜索图书名称
        $url = "";
        $biqugeSearchResult = getCurlRequestResult($url);
        $biquge = [];

        $bookshelf = Bookshelf::create([
            "book_name"=>$bookName,
            "zhuishu_id"=>$bookRequest->zhuishu_id,
            "biquge_id"=>$biquge["id"],
            "user_id"=>$user->id,
            "cover_url"=>$bookRequest->cover_url
        ]);

        $resultArray = [
            "status"=>1,
            "msg"=>'success'
        ];

        return $this->response->array($resultArray)->setStatusCode(201);
    }
}
