<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pret;


class PretsController extends Controller
{
    public function listPrets(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of Prets',
                'data'=> Pret::all()

            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

public function getSessionPrets()
{
    $prets = DB::table('Membres_sessions')
    ->join('Prets', 'Membres_sessions.id_membre_session', '=', 'Prets.id_membre_session')
    ->join('Membres', 'Membres_sessions.id_membre', '=', 'Membres.id_membre')
    ->select('Membres_sessions.id_session','Membres_sessions.id_membre', 'Membres.nom', 'Membres.prenom', 'Prets.montant', 'Prets.interet_generer', 'Prets.date_remboursement', 'Prets.date_pret', 'Prets.duree')
    ->distinct()->orderBy('Prets.date_pret', 'desc')->get();

    return response()->json($prets);
}


}
