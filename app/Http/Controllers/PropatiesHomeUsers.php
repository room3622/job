<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use APP\Providers;
use Illuminate\View\View;
use App\PropartiesModel;
use App\Towns;

class PropatiesHomeUsers extends Controller
{






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


    public function show($id)
    {


        $proparties  = PropartiesModel::find($id);


        if($proparties){






            $town = Towns::find($proparties->town);




            return view('edit',compact('town'), compact('proparties'));
        }else{

            //or 404
            return  redirect('/');
        }


    }


    public function edit($id)
    {
        $pro = PropartiesModel::find($id);
        $towns = Towns::all();

        return view('admin.propaties.edit', compact('pro'),compact('towns'));
    }

    public function CreateTown($request){

        $data = Towns::create(['name'=> $request->town]);

        return $data->id;
    }


    public function update(Request $request, $id)
    {

        request()->validate([
            'prise' => 'required',
            'beds' => 'required',
            'wc' => 'required',
            'contacts' => 'required',

        ]);

        $townCheck = Towns::where('name', $request->get('town'))->first();

        if(!$townCheck){
            $newTwn = $this->CreateTown($request);
            $request->merge(['town' => $newTwn]);
        }else{
            $request->merge(['town' => $townCheck->id]);
        }





        PropartiesModel::find($id)->update($request->all());


        return redirect()->route('home');

    }


}
