<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membre;


class MembresController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     */
    public function listMembres(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of members',
                'data'=> Membre::all()

            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getMembre($id)
    {
        $member= Membre::where("id_membre", $id)->exists();
        if($member){
            return response()->json([
                'status_code'=>200,
                'status_message'=>' member found',
                'data'=> Membre::where("id_membre", $id)->get()

            ]);
        }else{
            return response()->json([
                'status_code'=>404,
                'status_message'=>'no found',

            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $member = new Membre();
        $member->nom = 'Chimene';
        $member->prenom = 'Chimene';
        $member->formation = 'Chimene';
        $member->date_naissance = '2024-03-11';
        $member->actif= 0;
        $member->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(Membre $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Membre $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Membre $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Membre $member)
    {
        //
    }
}
