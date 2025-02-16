<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aide;


class TypeAidesController extends Controller
{
    public function listTypeAides(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'listes types aides',
                'data'=> Aide::all()
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }
}
