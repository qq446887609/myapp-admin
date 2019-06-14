<?php

namespace App\Http\Controllers\Admin;

use JPush\Client as JpushClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JpushController extends Controller
{
    /**
     * 测试发送app推送消息
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $jpush = new JpushClient(config('jpush.appKey'),config('jpush.masterSecret'));
            $response = $jpush->push()
                ->setPlatform('all')
                ->addAllAudience()
                ->setNotificationAlert('hello july')
                ->send();
            print_r($response);

        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
