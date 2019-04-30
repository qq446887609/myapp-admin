<?php

/**
 * 上传图片接口
 */

namespace App\Http\Controllers\Api\v1;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Api\v1\ImagesRequest;
use App\Model\Images;
use App\Transformers\ImagesTransformer;
use Illuminate\Http\Request;

class ImagesController extends ApiBaseController
{

    /**
     * @param ImagesRequest $request 图片接口validate
     * @param ImageUploadHandler $uploadHandler 图片处理函数
     * @param Images $images images model
     */
    public function store(ImagesRequest $request,ImageUploadHandler $uploadHandler,Images $images)
    {
        $user = $this->user();

        $size = $request->type == 'avatar' ? 362 : 1024;

        $result = $uploadHandler->save($request->image,str_plural($request->type),$user->id,$size);

        $images->path = $result['path'];
        $images->type = $request->type;
        $images->user_id = $user->id;
        $images->save();

        return $this->response->item($images,new ImagesTransformer())->setStatusCode(201);
    }
}
