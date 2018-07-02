<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Console\Scheduling\Schedule;

use APP\Providers;
use Illuminate\View\View;
use App\Towns;
use App\User;


class Api extends Controller
{


    public function tokenGen($bites=30){

        /*
         * generates 60 rondon characters number and letters
         * gonna use to create a user token when requested
         *
         * wee have to loog the query withe a hash
         */
        return bin2hex(openssl_random_pseudo_bytes($bites));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $token = $this->tokenGen();


        $users = User::all();


        return view('admin.api.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){


    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

        $user = User::find($id);
        $user->api_token = $this->tokenGen();
        $user->save();


        return redirect()->route('api.index')->with('success','Api  successfully Generate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->api_token = "";
        $user->save();


        return redirect()->route('api.index')->with('success','Api  successfully Deleted');
    }
}
