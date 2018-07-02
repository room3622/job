<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\PropartiesModel;
use App\Towns;

class HomeController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $town = Towns::all();

        $proparties  = PropartiesModel::where('user_id', '=', Auth::user()->id)->get();


        return view('home',compact('town'), compact('proparties'));
    }
}
