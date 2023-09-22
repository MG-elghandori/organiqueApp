<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;

class CustomAuthController extends Controller
{
    public function login(){
        session(['isLoggedIn' => false]);
        return view('Login.loginPage');
       }

       public function registration(){
        $user=User::all();
        return view('Login.registration',compact('user'));
       }

       public function registerUser(Request $request)
       {
           $request->validate([
               'name' => 'required',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:5|max:12|confirmed',
           ]);
       
           $user = new User();
           $user->name = $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
           $res = $user->save();
           return redirect()->route('Accueil');

        if (!$res) {
               return back()->with('err', "Erreur lors de l'ajout, veuillez vérifier les données saisies.");
           }
       }

       public function loginUser(Request $request){
        $request->validate([
            'email'=>"required|email",
            'password'=>"required|min:5|max:12",
        ]);
        $user= User::where('email',$request->email)->first();
        
        if($user){
            if(Hash::check($request->password,$user->password)){
                session(['isLoggedIn' => true]);
                return redirect()->route("Accueil");
            }else{
                return back()->with('err',"password incorrec!");
            }
        }else{
            return back()->with('err',"email incorrec!");
        }   
       }

       public function deleteUser($id)
       {
           $user = User::find($id);
       
           if (!$user) {
               return redirect()->back()->with('error', 'L\'utilisateur n\'existe pas.');
           }
       
           $user->delete();
           return redirect()->back()->with('success', 'L\'utilisateur a été supprimé avec succès.');
       }
       
}
