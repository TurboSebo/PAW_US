<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserManagementController extends Controller
{
    public function promoteToModerator($id){
        $user =  User::findOrFail($id);
        
        if (Auth::user()->isAdmin()){
            $user->rola = 2;
            $user->save();

            DB::table('role_uzytkownikow')->insert([
                'id_roli' => 2,
                'id_uzytkownika' => $user->id_uzytkownika,
                'data_nadania' => now(),
                'kto_nadal' => Auth::user()->id_uzytkownika
            ]);

            return redirect()->back()->with('status', 'Uzytkownik został awansowany na moderatora.');
        }
        return redirect()->back()->with('error', 'Nie masz uprawnień do wykonania tej akcji');

    }

    public function demoteToUser($id){
        $user = User::findOrFail($id);
        if (Auth::user()->isAdmin()){
            $user->rola = 3;
            $user->save();

            DB::table('role_uzytkownikow')
            ->where('id_uzytkownika', $user->id_uzytkownika)
            ->update(['data_odebrania'=> now()]);
            return redirect()->back()->with('status', 'Uprawnienia moderatora zostały odebrane użytkownikowi');
        }
        return redirect()->back()->with('error', 'Nie masz uprawnień do wykonania tej akcji');
    }
}
