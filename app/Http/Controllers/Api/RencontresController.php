<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rencontre;


class RencontresController extends Controller
{
    //
    public function listRencontres(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of rencontres',
                'data'=> Rencontre::all()

            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function getRencontre($id)
    {
        $rencontre= Rencontre::where("id_rencontre", $id)->exists();
        if($rencontre){
            return response()->json([
                'status_code'=>200,
                'status_message'=>' rencontre found',
                'data'=> Rencontre::where("id_rencontre", $id)->get()

            ]);
        }else{
            return response()->json([
                'status_code'=>404,
                'status_message'=>'no found',

            ]);
        }
    }

    public function getSessionRencontres()
{
    $rencontres = DB::table(' Rencontres ')
        ->join('Membres_sessions', 'Membres_sessions.id_membre_session', '=', 'Rencontres.id_membre_session')
        ->join('Membres', 'Membres_sessions.id_membre', '=', 'Membres.id_membre')
        ->select('Membres_sessions.id_session','Rencontres.id_rencontre', 'Membres_sessions.id_membre', 'Membres.nom', 'Membres.prenom', 'Rencontres.date_rencontre', 'Rencontres.commentaire', 'Rencontres.lieu')
        ->get();

    return response()->json($rencontres);
}

public function getRencontreParticipants()
{
    $participants = DB::table('Assiste')
        ->join('Rencontres', 'Assiste.id_rencontre', '=', 'Rencontres.id_rencontre')
        ->join('Membres', 'Assiste.id_membre', '=', 'Membres.id_membre')
        ->select('Assiste.id_membre', 'Membres.nom', 'Membres.prenom', 'Rencontres.date_rencontre', 'Assiste.id_rencontre', 'Rencontres.commentaire', 'Rencontres.lieu')
        ->get();

    return response()->json($participants);
}
}
