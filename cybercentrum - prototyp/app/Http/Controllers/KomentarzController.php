<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentarz;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class KomentarzController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'tresc' => 'required|string|max:2000',
        ]);

        if ($post->czy_usuniete) {
            return redirect()->route('posts.show', $post->id_posta)->with('error', 'Nie można dodawać komentarzy do usuniętego posta.');
        }

        Komentarz::create([
            'id_uzytkownika' => Auth::user()->id_uzytkownika,
            'id_posta' => $post->id_posta,
            'tresc' => $request->input('tresc'),
            'data_wstawienia' => now(),
        ]);

        return redirect()->route('posts.show', $post->id_posta)->with('success', 'Komentarz dodany');
    }

    public function destroy(Komentarz $komentarz)
    {
        $user = Auth::user();
        if ($komentarz->canBeDeletedBy($user)) {
            $komentarz->update([
                'czy_usuniete' => 1,
                'kto_usunal' => $user->id_uzytkownika,
                'data_usuniecia' => now(),
            ]);
            return redirect()->back()->with('success', 'Komentarz usunięty');
        }
        return redirect()->back()->with('error', 'Nie masz uprawnień do usunięcia tego komentarza.');
    }
}
