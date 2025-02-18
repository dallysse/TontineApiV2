<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembreSession;


class MembreSessionsController extends Controller
{
    public function listMembreSessions(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of members',
                'data'=> MembreSession::all()

            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    public function getSessionMembersVer1($sessionId)
{
    $members = DB::table('Membres_sessions')
        ->join('Membres', 'Membres_sessions.id_membre', '=', 'Membres.id_membre')
        ->where('Membres_sessions.id_session', $sessionId)
        ->select('Membres.id_membre', 'Membres.nom', 'Membres.prenom', 'Membres.date_naissance', 'Membres_sessions.mois_encaissement', 'Membres_sessions.actif')
        ->get();

    return response()->json($members);
}

public function getSessionMembers()
{
    $members = DB::table('Membres_sessions')
        ->join('Membres', 'Membres_sessions.id_membre', '=', 'Membres.id_membre')
        ->select('Membres_sessions.id_session','Membres.id_membre', 'Membres.nom', 'Membres.prenom', 'Membres.date_naissance', 'Membres_sessions.mois_encaissement', 'Membres_sessions.actif')
        ->orderBy('Membres_sessions.mois_encaissement')->get();

    return response()->json($members);
}

public function getSessionRencontres()
{
    $rencontres = DB::table('Membres_sessions')
        ->join('Rencontres', 'Membres_sessions.id_membre_session', '=', 'Rencontres.id_membre_session')
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

public function getSessionRencontreDep()
{
    $members = DB::table('Rencontre_depenses')
        ->join('Rencontres', 'Rencontre_depenses.id_rencontre', '=', 'Rencontres.id_rencontre')
        ->join('Membres_sessions', 'Membres_sessions.id_membre_session', '=', 'Rencontres.id_membre_session')
        ->join('Sessions', 'Membres_sessions.id_session', '=', 'Sessions.id_session')
        ->select('Sessions.id_session','Rencontre_depenses.id_rencontre','Rencontre_depenses.montant_depense', 'Rencontre_depenses.motif_depense', 'Rencontres.date_rencontre', 'Rencontres.id_membre_session')
        ->get();

    return response()->json($members);
}

public function getSessionAides()
{
    $members = DB::table('Membres_sessions')
        ->join('Aides', 'Membres_sessions.id_membre_session', '=', 'Aides.id_membre_session')
        ->join('Membres', 'Membres_sessions.id_membre', '=', 'Membres.id_membre')
        ->join('Aide_type', 'Aides.id_type_aide', '=', 'Aide_type.id_type_aide')
        ->join('Aide_montant', 'Aides.id_type_aide', '=', 'Aide_montant.id_type_aide')
        ->select('Membres_sessions.id_session','Membres_sessions.id_membre', 'Membres.nom', 'Membres.prenom','Aides.id_aide', 'Aides.date_versement', 'Aides.commentaire', 'Aides.date_ouverture_aide', 'Aide_type.type_aide', 'Aide_montant.montant')
        ->distinct()->orderBy('Aides.date_ouverture_aide', 'desc')->get();

    return response()->json($members);
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
