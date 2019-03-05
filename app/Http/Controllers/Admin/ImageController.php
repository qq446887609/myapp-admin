<?php

namespace App\Http\Controllers\Admin;

use App\Model\ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.image.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.image.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data = $request->except('_token');

       $obj = new ImageModel();

       $result = $obj->add($data);

       if($result){
           return response()->json(['status'=>'success']);
       }else{
           return response()->json(['status'=>'error']);
       }
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

    /**
     * 上传图片
     */
    public function upload(Request $request)
    {
        $file = $request->file('file');

        if($file->isValid()){

            $suffix = $file->getClientOriginalExtension();

            $allow_format = ['jpg','jpeg','png','gif'];

            if(!in_array($suffix,$allow_format)){
                return '格式必须为\'jpg\',\'jpeg\',\'png\',\'gif\'';
            }

            $newName = md5(time()).'.'.$suffix;

            $base_path = 'uploads/images';

            $path = $file->move($base_path,$newName);

            return response()->json(['status'=>'success','url'=>"".$path.""]);
        }
    }

}
