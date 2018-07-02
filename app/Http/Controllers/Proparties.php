<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use APP\Providers;
use Illuminate\View\View;
use App\PropartiesModel;
use App\Towns;

class Proparties extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $town = Towns::all();

        $proparties  = PropartiesModel::latest()->paginate(5);



        return view('admin.propaties',compact('town'), compact('proparties'))->with('i', (request()->input('page', 1) - 1) * 5);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $towns = Towns::all();

        return view('admin.propaties.create',compact('towns'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request){
        request()->validate([
            'info' => 'required',
            'prise' => 'required',
            'beds' => 'required',
            'wc' => 'required',
            'contacts' => 'required',
            'town' => 'required',

        ]);



        PropartiesModel::create($request->all());
        return redirect('admin/proparties')->with('success', 'Post created successfully');


    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pro = PropartiesModel::find($id);

        $town = Towns::find($pro->town);

        return view('admin.propaties.show', compact('pro'),compact('town'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pro = PropartiesModel::find($id);
        $towns = Towns::all();

        return view('admin.propaties.edit', compact('pro'),compact('towns'));
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
            'info' => 'required',
            'prise' => 'required',
            'beds' => 'required',
            'wc' => 'required',
            'contacts' => 'required',

        ]);
        PropartiesModel::find($id)->update($request->all());


        return redirect()->route('proparties.index')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PropartiesModel::find($id)->delete();
        return redirect()->route('proparties.index')->with('success','Post deleted successfully');

    }
}
