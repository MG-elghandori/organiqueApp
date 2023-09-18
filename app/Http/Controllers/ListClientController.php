<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ListClientController extends Controller
{
   public function index(){
   $data= Client::paginate(8);
    return view('client.ListClients',compact("data"));
   }
}
