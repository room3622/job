<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PropartiesResorses extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

           $data = [
                    'id'        => $this->id,
                    'info'      => $this->info,
                    'prise'     => $this->prise,
                    'beds'      => $this->beds,
                    'wc'        => $this->wc,
                    'town'      => $this->town,
                    'contacts'  => $this->contacts
           ];

           return $data;
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
