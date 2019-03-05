<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function Index()
    {

        $sms = app('easysms');
        try {
            $result = $sms->send('13083079579', [
                'template' => 'SMS_143717573',
                'data' => [
                    'code' => 6666
                ],
            ]);        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $response = $exception->getExceptions();
            dd($response);
        }

        return view('admin.index');
    }
}
