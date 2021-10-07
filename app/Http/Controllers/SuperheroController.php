<?php

namespace App\Http\Controllers;

use App\Models\Biography;
use App\Models\Powerstat;
use App\Models\Superhero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Superhero::with([]);

        if ($request->no_paginate == true) {
            return response([
                'status' => 0,
                'items' => $data->get()
            ], 200);
        }

        return response([
            'status' => 0,
            'items' => $data->paginate(10)
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), Superhero::$form_rules);

        if ($validator->fails)
            return response([ 
                'status' => 1, 
                'errors' => $validator->errors(), 
                'message' => 'Hubo algunos errores al momento de validar los campos.', ], 
                400); 
        
            $biography = Biography ::create([
                'name' => $request['name'],
                'years_old' => $request['years_old'],
                'birthplace' => $request['birthplace'],
                'race' => $request['race'], ]);
    
            $powerstat = Powerstat::create([
                'intelligence' => $request['intelligence'],
                'speed' => $request['speed'],
                'power' => $request['power'],
                'durability' => $request['durability'], ]);
    
            $superhero = Superhero::create([
                'alter_ego' => $request['alter_ego'],
                'powerstat_id' => $powerstat->id,
                'biography_id' => $biography->id, ]);
        
        return response([ 
            'item' => $superhero, 
            'message' => 'Invalid credentials'], 
            400); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superhero $superhero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Superhero  $superhero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superhero $superhero)
    {
        //
    }
}
