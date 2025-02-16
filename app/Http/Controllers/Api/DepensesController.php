<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Depense;

class DepensesController extends Controller
{
    public function listDepenses(){
        try{
            return response()->json([
                'status_code'=>200,
                'status_message'=>'list of Depenses',
                'data'=> Depense::all()

            ]);
        }catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getDepense($id)
    {
        $depense= Depense::where("id", $id)->exists();
        if($depense){
            return response()->json([
                'status_code'=>200,
                'status_message'=>' depense found',
                'data'=> Depense::where("id", $id)->get()

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
        $depense = new Depense();
        $depense->nom = 'Chimene';
        $depense->prenom = 'Chimene';
        $depense->formation = 'Chimene';
        $depense->date_naissance = '2024-03-11';
        $depense->actif= 0;
        $depense->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(Depense $depense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedepenseRequest $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        //
    }}
