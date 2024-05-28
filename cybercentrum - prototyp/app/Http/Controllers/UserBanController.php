<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBanController extends Controller
{
    public function banUser($id){
        $user = User::findOrFail($id);

        if (Auth::user()->isAdmin() || Auth::user()->isModerator()){
            if (!$user->isAdmin()){
            $user->konto_aktywne=0;
            $user->data_dezaktywacji = now();
            $user->save();
            
            return redirect()->back()->with('status', 'Uzytkownik został zbanowany');
            }
        }
        return redirect()->back()->with('error', 'Nie masz uprawnień do wykonania tej akcji');

    }
    public function unbanUser($id){
        $user = User::findOrFail($id);
    
        if (Auth::user()->isAdmin() || Auth::user()->isModerator()){
            $user->konto_aktywne = 1;
            $user->data_dezaktywacji = NULL;
            $user->save();
    
            return redirect()->back()->with('status', 'Uzytkownik został odbanowany');
        }
        return redirect()->back()->with('error', 'Nie masz uprawnień do wykonania tej akcji');
    }
    

}
