<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropartiesModel;
use App\Towns;

class Propertiestobay extends Controller
{


    public function index(){
        $town = Towns::all();

        $proparties  = PropartiesModel::where('user_id', '=', null)->get();

        return view('Template',compact('town'), compact('proparties'));
    }



    public function show(){


        return'ola';
    }


}
