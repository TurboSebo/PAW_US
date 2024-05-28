<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LogowanieController extends Controller
{
    
    public function showLoginForm()
    {
    if (Auth::check()) {
        // Użytkownik jest zalogowany, przekieruj go na dashboard
        return redirect()->intended('dashboard');
    }

    // Użytkownik nie jest zalogowany, //leci do formularza logowania
    return view('login');
}

    public function showRegisterForm(){ //leci do formularza rejestracji
        return view('register');
    }
    public function login(Request $request){        //próba zalogowania
        $dane_logowania = $request->validate([
            'nazwa_uzytkownika' => ['required'],
            'haslo' => ['required'],
        ]);
      
        $request->session()->put('user_input', $dane_logowania);// przechowaj to co wprowadził użytkownik w danych sesji (na czas testów)
        //if (Auth::attempt(['email' => $dane_logowania['nazwa_uzytkownika'], 'password' => $dane_logowania['haslo']])) {
        if (Auth::attempt(['nazwa_uzytkownika' => $dane_logowania['nazwa_uzytkownika'], 'password' => $dane_logowania['haslo'], 'konto_aktywne' => 1])) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'nazwa_uzytkownika' => 'Podane dane nie pasują do naszych rekordów.',
            ]);
        }
        //return view('login');
    }
    

    public function register(Request $request){
    $request->validate([
        'nazwa_uzytkownika' => ['required', 'string', 'max:255', 'unique:uzytkownicy'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:uzytkownicy'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'accept' => ['accepted'],
    ]);
    session_start();
    $_SESSION['user_data'] = User::registerUser($request->all()); //wywołanie metody registerUser w modelu User.php
   
    //  komunikat do sesji flash - metoda do przechowania danych o sukcesie rejestracji
    $request->session()->flash('status', 'Udana rejestracja! Możesz się teraz zalogować.');
    
    return redirect()->route('login');
}



    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}