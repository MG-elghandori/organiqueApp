<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use App\Models\Finance;
use App\Models\Stock;
use Carbon\Carbon;

class ClientController extends Controller
{

    public function index(){
        $data= Client::paginate(6);
         return view('client.ListClients',compact("data"));
        }
     
        public function create()
        {
            $stocks = Stock::all(); 
            return view("client.AjouterClient", compact('stocks'));
        }
        
        

        public function store(Request $request){
            $request->validate([
                'nom'=>'required',
                'phone' => [
                    'required',
                    'numeric',
                ],
                'produit'=>'required',
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
        $client->produit = $request->produit;
        $client->typeDecompte = $typeDecompte;
        $client->prix = $request->prix;
        $client->methodPay = $request->methodPay;
        $client->date_fin = $date_fin;
        $client->save();

         Stock::where('produitStock', $request->produit)->update(['use' => 1]);

        $prix = $client->prix;
    
       
        $methodPay = $request->methodPay;
        $finances = new Finance();
    
       if ($methodPay == 'CIH') {
            $finances->updateCompteCIH($prix);
        } elseif ($methodPay == 'TIJARI') {
            $finances->updateCompteTIJARI($prix);
        } elseif ($methodPay == 'Autres') {
            $finances->updateArgent($prix);
        }
            return redirect()->route('AjouterClient')->with("success", "L'ajout de la nouvelle annonce a bien réussi!");
        }


        public function destroy($id){
           $item=Client::findOrFail($id);
           $item->delete();
           return redirect()->route('listClients')->with('success', 'L\'élément a été supprimé avec succès');
        }
     
        public function edit($id){
           $item=Client::findOrFail($id);
           return view('client.editClient',compact("item"));
        }
     
        public function update(Request $request,$id){
           $item = Client::findOrFail($id);
           $request->validate([
              'nom'=>'required',
              'phone' => [
                  'required',
                  'numeric',
              ],
              'produit'=>'required',
              'typeDecompte'=>'required|in:1mois,3mois,6mois,1ans',
              'prix'=>'required|min:0|numeric',
              'methodPay'=>'required|in:CIH,ORANGE,TIJARI,Autres',
          ]);
     
          $item->nom = $request->input('nom');
         $item->phone = $request->input('phone');
         $item->produit = $request->input('produit');
         $item->typeDecompte = $request->input('typeDecompte');
         $item->prix = $request->input('prix');
         $item->methodPay = $request->input('methodPay');
         $date_creation = Carbon::parse($item->created_at);
         switch ($item->typeDecompte) {
           case '1mois':
               $item->date_fin = $date_creation->addMonth();
               break;
           case '3mois':
               $item->date_fin = $date_creation->addMonths(3);
               break;
           case '6mois':
               $item->date_fin = $date_creation->addMonths(6);
               break;
           case '1ans':
               $item->date_fin = $date_creation->addYear();
               break;
       }
         $item->save();
         return redirect()->route('listClients')->with('success', 'L\'élément a été mis à jour avec succès');
        }
     
        public function show($id){
           $item=Client::findOrFail($id);
           return view('client.DetailsClient',compact("item"));
        }
}
