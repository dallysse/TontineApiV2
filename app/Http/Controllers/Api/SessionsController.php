<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;


class SessionsController extends Controller
{
    //
    public function listSessions(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of sessions',
                'data'=> Session::all()

            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSession($id)
    {
        $session= Session::where("id_session", $id)->exists();
        if($session){
            return response()->json([
                'status_code'=>200,
                'status_message'=>' session found',
                'data'=> Session::where("id_session", $id)->get()

            ]);
        }else{
            return response()->json([
                'status_code'=>404,
                'status_message'=>'no found',

            ]);
        }
    }
}
