<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amande;

class AmandesController extends Controller
{
    public function listAmandes(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of amandes',
                'data'=> Amande::all()
            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function listAmandesMembreSess()
    {
        $Amandes = DB::table('Membres_sessions')
        ->join('Amandes', 'Membres_sessions.id_membre_session', '=', 'Amandes.id_membre_session')
        ->join('Membres', 'Membres_sessions.id_membre', '=', 'Membres.id_membre')
        ->select('Membres_sessions.id_session','Membres_sessions.id_membre', 'Membres.nom', 'Membres.prenom', 'Amandes.id_amande', 'Amandes.id_membre_session','Amandes.date_amande','Amandes.motif_amande', 'Amandes.montant' ,'Amandes.date_payement')
        ->distinct()->orderBy('Amandes.date_amande', 'desc')->get();

        return response()->json($Amandes);
    }

}
