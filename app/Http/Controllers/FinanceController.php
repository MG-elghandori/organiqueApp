<?php

namespace App\Http\Controllers;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
   public function index()
    {
        $dataFinance=Finance::all();
        return view("Finance.ListFinance",compact('dataFinance'));
    }

    public function edit($id){
      $datafinance= Finance::findOrFail($id);
      return view('Finance.EditFinance',compact('datafinance'));
    }

    public function update(Request $request,$id){
      $updatefinance= Finance::findOrFail($id);
      $request->validate([
        'compteCIH'=> [
          'required',
          'numeric',
      ],
        'compteTIJARI' => [
            'required',
            'numeric',
        ],
        'echopping' => [
            'required',
            'numeric',
        ],
        'Credit' => [
            'required',
            'numeric',
        ],
        'argent' => [
            'required',
            'numeric',
        ],
    ]);
    $updatefinance->compteCIH = $request->input('compteCIH');
    $updatefinance->compteTIJARI = $request->input('compteTIJARI');
    $updatefinance->echopping = $request->input('echopping');
    $updatefinance->Credit = $request->input('Credit');
    $updatefinance->argent = $request->input('argent');
    $updatefinance->save();
    return redirect()->route('Financedit', ['id' => $id])->with('success', 'L\'élément a été mis à jour avec succès');

    }


  
    public function updateCompteCIH($prix)
{
    $finances = Finance::first(); // Récupère le premier enregistrement de la table Finances
    $finances->compteCIH += $prix; // Incrémente la valeur de la colonne compteBank de la table Finances avec le prix
    $finances->save(); // Sauvegarde les modifications dans la base de données
}

    public function updateCompteTIJARI($prix)
{
    $finances = Finance::first(); // Récupère le premier enregistrement de la table Finances
    $finances->compteTIJARI += $prix; // Incrémente la valeur de la colonne compteBank de la table Finances avec le prix
    $finances->save(); // Sauvegarde les modifications dans la base de données
}
public function updateArgent($prix)
{
    $finances = Finance::first(); // Récupère le premier enregistrement de la table Finances
    $finances->argent += $prix; // Incrémente la valeur de la colonne argent de la table Finances avec le prix
    $finances->save(); // Sauvegarde les modifications dans la base de données
}
}
