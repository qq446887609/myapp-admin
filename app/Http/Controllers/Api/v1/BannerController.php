<?php

namespace App\Http\Controllers\Api\v1;

/**
 * banner api
 */

use App\Model\ImageModel;
use App\Transformers\BannerTransformer;
use Illuminate\Http\Request;

class BannerController extends ApiBaseController
{
    public function index()
    {
        return $this->response->collection(ImageModel::all(),new BannerTransformer());
    }
}
