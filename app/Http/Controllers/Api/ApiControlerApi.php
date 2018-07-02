<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Proparties;
use Hamcrest\Thingy;
use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use Validator;

use App\Http\Controllers\Controller;
use App\PropartiesModel;
use App\Http\Resources\PropartiesResorses;
use App\Http\Resources\JsonResorses;
use DB;

use App\Towns;



/**
 * @api {get} /api/apartments/ Read data of a Proparties
 * @apiVersion 0.0.1
 * @apiName Proparties
 * @apiGroup Proparties
 * @apiPermission admin
 *
 * @apiDescription Compare Verison 0.3.0 with 0.2.0 and you will see the green markers with new items in version 0.3.0 and red markers with removed items since 0.2.0.
 *
 * @apiParam {String} id The Users-ID.
 *
 * @apiExample Example usage:
 * curl -i https://job.web360-tech.cloud/api/apartments?api_token=
 *
 * @apiSuccess {String}   id            The Propartie-ID.
 * @apiSuccess {String}   info          The Propartie Information.
 * @apiSuccess {String}   prise         The Propartie Prise.
 * @apiSuccess {String}   beds          Number of Propartie Beds
 * @apiSuccess {String}   wc            Number of Propartie WC
 * @apiSuccess {String}   contacts      Contact Number
 * @apiSuccess {String}   town          City of The Propartie
 *
 *
 * @apiError NoAccessRight Only authenticated Admins can access the data.
 * @apiError UserNotFound   The <code>id</code> of the User was not found.
 *
 * @apiErrorExample Response (example):
 *      {
 *       "messages": "Bad Request",
 *       "time": "2018-06-30 01:38:48",
 *       "identity": "6c86sRAjGFadILKW"
 *       }
 */

/**
 * @apiVersion 0.0.1
 * @apiName response
 * @apiGroup Response
 * @apiPermission user
 * @api {get} ?api_token=add9883bb8eeae01ce4943108782c67c3dc8c4526ad317e5554d69e734d6
 * @apiSuccessExample {json} Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *       {
 *           "data": [
 *                       {
 *                       "id":       18,
 *                       "info":     "The Info",
 *                       "prise":    "100",
 *                       "beds":     "2",
 *                        "wc":      "1",
 *                       "town":     "6",
 *                       "contacts": "00265897"
 *                       }
 *                   ]
 *           }
 *     }
 */












class ApiControlerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $proparties = PropartiesModel::all();



        return PropartiesResorses::collection($proparties);


    }






    public function CreateTown($request){

        $data = Towns::create(['name'=> $request->town]);

        return $data->id;
    }





    public function store(Request $request){


        $data = new PropartiesModel($request->all());


        if(!$data->Validate()){
            return $this->showErros($data);
        }else{


            $townCheck = Towns::where('name', $request->get('town'))->first();

            if(!$townCheck){
                $newTwn = $this->CreateTown($request);
                $request->merge(['town' => $newTwn]);
            }else{
                $request->merge(['town' => $townCheck->id]);
            }


            if($request->get('id')){

                /**
                 * @apiVersion 0.0.1
                 * @apiName Updating Properties
                 * @apiGroup Updating Properties
                 * @apiPermission user
                 * @api {POST} ?api_token=add9883bb8eeae01ce4943108782c67c3dc8c4526ad317e5554d69e734d6
                 * @apiSuccessExample {json} Success-Response:
                 *     HTTP/1.1 200 OK
                 *     {
                 *       {
                 *           "data": {
                 *           "id": 25,
                 *           "info": "Casa Do joao",
                 *           "prise": "100",
                 *           "beds": "2",
                 *           "wc": "1",
                 *           "town": 9,
                 *           "contacts": "Ruben"
                 *           },
                 *           "Version": "1.0.0",
                 *           "identity": "6c86sRAjGFadILKW",
                 *           "time": "2018-06-30 01:52:26"
                 *       }
                 *     }
                 */

                $data =   PropartiesModel::find($request->get('id'));
                if($data){
                    $data->update($request->all());
                    return new PropartiesResorses($data);
                }

            }else{
                /**
                 * @apiVersion 0.0.1
                 * @apiName Creating Properties
                 * @apiGroup Creating Properties
                 * @apiPermission user
                 * @api {get} ?api_token=add9883bb8eeae01ce4943108782c67c3dc8c4526ad317e5554d69e734d6
                 * @apiSuccessExample {json} Success-Response:
                 *     HTTP/1.1 200 OK
                 *     {
                 *       {
                 *           "data": {
                 *           "id": 25,
                 *           "info": "Casa Do joao",
                 *           "prise": "100",
                 *           "beds": "2",
                 *           "wc": "1",
                 *           "town": 9,
                 *           "contacts": "Ruben"
                 *           },
                 *           "Version": "1.0.0",
                 *           "identity": "6c86sRAjGFadILKW",
                 *           "time": "2018-06-30 01:52:26"
                 *       }
                 *     }
                 */

                $data =  PropartiesModel::create($request->all());
                return new PropartiesResorses($data);
            }


        }

    }


    public function showErros($data){

             $errors =  $data->error;
            return new JsonResorses($errors);
    }





    public function show(Request $request, $id)
    {

        $data = PropartiesModel::where('id', '=', $id)->first();

        if($data) {

            return new PropartiesResorses($data);
        }else{

            return $this->sendError($request, 'Bad Request', 401);
        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){

        $data = PropartiesModel::find($id);

        if($data){

            $data->delete();

            $proparties = PropartiesModel::all();
            return PropartiesResorses::collection($proparties);

        }else{

            $data2 ='bad Request';

            return $this->sendError($request, $data2,400);

        }

    }


    public function sendError($request, $messages, $code=200){
        $identity = $request->cookie('identity');
        $data2 =array(
            'messages'=>$messages,
            'time'=> date('Y-m-d H:i:s', time()),
            'identity'=>$identity
        );
        return response($data2,$code);

    }
}


