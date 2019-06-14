<?php
/**
 * Created by summer winds.
 * Date: 2019/4/29
 * Time: 上午9:20
 * Desc:
 */

namespace App\Http\Controllers\Api\v1\logic;


class Articles extends BaseLogic
{
    /**
     * 获得aritlces 列表查询条件
     * @param $params['tag'] 标签关键字
     * @param $params['key'] title 标题
     * @return $arr
     */
    public static function getArticleListWhere($params)
    {
        $where = [];

        !empty($params['tag']) && $where[] =  ['tag','like',"%".trim($params['tag'])."%"];

        !empty($params['key']) && $where[] =  ['title','like',"%".trim($params['key'])."%"];

        return $where;
    }
}