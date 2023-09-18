<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AjouterClientController extends Controller
{
    public function index(){
        return view("client.AjouterClient");
    }
    public function create(Request $request){
        $request->validate([
            'nom'=>'required',
            'phone' => [
                'required',
                'numeric',
            ],
            'typeDecompte'=>'required|in:1mois,3mois,6mois,1ans',
            'prix'=>'required|min:0|numeric',
            'methodPay'=>'required|in:CIH,ORANGE,TIJARI,Autres',
        ]);

       
    $typeDecompte = $request->input('typeDecompte');

    $date_fin = Carbon::now();
    switch ($typeDecompte) {
        case '1mois':
            $date_fin->addMonth();
            break;
        case '3mois':
            $date_fin->addMonths(3);
            break;
        case '6mois':
            $date_fin->addMonths(6);
            break;
        case '1ans':
            $date_fin->addYear();
            break;
    }
    $client = new Client();
    $client->nom = $request->nom;
    $client->phone = $request->phone;
    $client->typeDecompte = $typeDecompte;
    $client->prix = $request->prix;
    $client->methodPay = $request->methodPay;
    $client->date_fin = $date_fin;
    $client->save();
        return redirect()->route('AjouterClient')->with("success", "L'ajout de la nouvelle annonce a bien réussi!");
    }
}
