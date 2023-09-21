<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $dataStock=Stock::all();
        return view('Stock.listStock',compact('dataStock'));
    }

    public function create()
    {
        return view("Stock.AjouterStock");
    }

    public function store(Request $request){
        $request->validate([
            'produitStock'=>'required',
        ]);

        $produitStock = $request->input('produitStock');
        $stock=new Stock();
        $stock->produitStock = $produitStock;
        $stock->save();

        return redirect()->route('Stockcreate')->with("success", "L'ajout de la nouvelle élément a bien réussi!");
    }

    public function destroy($id){
        $item=Stock::findOrFail($id);
        $item->delete();
        return redirect()->route('Stockpage')->with('success', 'L\'élément a été supprimé avec succès');
    }

    public function edit($id){
        $itemStock=Stock::findOrFail($id);
        return view('Stock.EditStock',compact("itemStock"));
    }

    public function update(Request $request,$id){
        $itemStk = Stock::findOrFail($id);
        $request->validate([
            'produitStock'=>'required',
        ]);
  
       $itemStk->produitStock = $request->input('produitStock');
       $itemStk->save();
       return redirect()->route('editStock.edit',['id' => $id])->with('success', 'L\'élément a été mis à jour avec succès');
    }

    public function updateUse($id){
        $stock = Stock::findOrFail($id);
        $stock->use = 1;
        $stock->save();
        return redirect()->route('Stockpage');
    }

    public function AnulereditUse($id){
        $stock = Stock::findOrFail($id);
        $stock->use = 0;
        $stock->save();
        return redirect()->route('Stockpage');
    }
}