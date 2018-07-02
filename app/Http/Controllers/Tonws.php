<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use APP\Providers;
use Illuminate\View\View;
use App\Towns;


class Tonws extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $towns  = Towns::latest()->paginate(5);



        return view('admin.tonws',compact('towns'))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $towns = Towns::all();

        return view('admin.tonws.create',compact('towns'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        request()->validate([
            'name' => 'required',

        ]);



        Towns::create($request->all());
        return redirect(route('tonws.index'))->with('success', 'Post created successfully');


    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = Towns::find($id);
        return view('admin.tonws.show', compact('pro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro = Towns::find($id);
        return view('admin.tonws.edit', compact('pro'));
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

        request()->validate([
            'name' => 'required',

        ]);
        Towns::find($id)->update($request->all());


        return redirect()->route('tonws.index')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Towns::find($id)->delete();
        return redirect()->route('tonws.index')->with('success','Post deleted successfully');

    }
}
