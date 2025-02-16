<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AidePrevus;


class AidesController extends Controller
{
    public function listAides(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of aides',
                'data'=> Aides::all()
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }


}
