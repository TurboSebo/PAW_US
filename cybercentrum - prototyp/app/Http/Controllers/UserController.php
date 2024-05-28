<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id){ // szukaj użytkownika po id 
        $user = User::findOrFail($id);
        $isOwner = Auth::check() && Auth::user()->id_uzytkownika == $id;
        
        return view('user.profile', compact('user', 'isOwner'));
    }
    public function showByUsername($username) // szukaj użytkownika po nazwie 
    {
        $user = User::where('nazwa_uzytkownika', $username)->firstOrFail();
        $isOwner = auth()->check() && auth()->user()->id_uzytkownika == $user->id_uzytkownika;

        return view('user.profile', compact('user', 'isOwner'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if (Auth::user()->id_uzytkownika != $id) return redirect()->route('user.profile', ['id' => $id]);
    

        $request->validate([
            'about' => 'nullable|string|max:500',
        ]);

        $user->o_mnie = $request->input('o_mnie'); //pobranie z pola 'o_mnie'
        $user->save();
        
        return redirect()->route('user.profile', ['id' => $id])->with('status', 'Profil zaktualizowany.');

    }

   
    public function index()
    {
        $users = User::all(); // Pobierz wszystkich użytkowników
        return view('user.index', compact('users')); // Przekazanie danych do widoku
    }
}
