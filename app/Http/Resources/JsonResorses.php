<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class JsonResorses extends Resource
{
    /
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }


    public function with($request)
    {
        $identity = $request->cookie('identity');
        $data = [
            'Version'=>'1.0.0',
            'identity'=> $identity,
            'time'=> date('Y-m-d H:i:s', time()),
        ];


        return $data;
    }


}
