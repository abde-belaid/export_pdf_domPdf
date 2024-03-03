<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Type;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chambres = Chambre::all();
        $types = Type::all();
        // dd($chambres);
        return view("Chambre.index", compact("chambres", "types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public  function create()
    {
        $types = Type::all();
        return view('Chambre.create')->with("types", $types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required',
            'description' => 'required|max:200',
            'superficier' => 'required|integer|between:15,60',
            'etage' => 'required',
            'prix' => 'required',
        ]);
        $chambre = new Chambre();
        $chambre->type_id = $request->type_id;
        // dd($request->etage);
        $chambre->description = $request->description;
        $chambre->superficier = $request->superficier;
        $chambre->etage = $request->etage;
        $chambre->prix = $request->prix;
        $chambre->save();
        return redirect(route("index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chambre = Chambre::findOrFail($id);
        $users = $chambre->users;
        $type = $chambre->type;
        // dd($type->titre);
        $reservations = $chambre->reservations;
        // dd($reservation);
        return view('Chambre.show', compact('chambre', 'reservations', 'users', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function pdf(string $id)
    {

        // les commandes :
        // la commande 1 :composer require barryvdh/laravel-dompdf
        // la commanade 3 :  php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
        // apres en ajouter dans service provider la class pdf  dans confi/app.php
        // et si on veut on ajout un alais dans les alias confi/app.php



        $chambre = Chambre::findOrFail($id);
        $users = $chambre->users;
        $type = $chambre->type;
        $reservations = $chambre->reservations;
        // return view('Chambre.show',compact('chambre','reservations','users','type'));
        view()->share(["chambre" => $chambre, "users" => $users, "type" => $type, "reservations" => $reservations]);
        $pdf = PDF::loadView("Chambre.pdf", [$chambre, $users, $type, $reservations])->setPaper('a4', 'portrait');
        // return $pdf->save(public_path("storage/".$chambre->id.".pdf"));
        return $pdf->download(public_path("storage/" .$chambre->id. ".pdf"));
    }
}
