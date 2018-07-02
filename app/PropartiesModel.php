<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class PropartiesModel extends Model
{

    protected $table = 'properties';


    private $rules=[
        'info'      => 'required',
        'prise'     => 'required',
        'beds'      => 'required',
        'wc'        => 'required',
        'contacts'  => 'required',
        'town'      => 'required',
    ];

    public function Validate(){

        $validator = Validator::make($this->attributes,$this->rules);
        if($validator->passes()) return true;
        $this->error = $validator->messages();
        return false;
    }







    protected $fillable = [
        'info', 'prise', 'beds','wc','contacts','town','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];



}
