<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('czy_usuniete', 0)->orderBy('data_utworzenia', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tytul_posta' => 'required|string|max:50',
            'tresc' => 'required|string|max:5000',
        ]);

        $post = new Post();
        $post->id_uzytkownika = Auth::user()->id_uzytkownika;
        $post->tytul_posta = $request->tytul_posta;
        $post->tresc = $request->tresc;
        $post->save();

        return redirect()->route('posts.index')->with('status', 'Post utworzony pomyślnie!');
    }

    public function show($id){
    $post = Post::findOrFail($id);
    if ($post->czy_usuniete && (!Auth::check() || !Auth::user()->isAdmin())) {
        return redirect()->route('posts.index')->with('error', 'Nie masz uprawnień do wyświetlenia tego posta.');
    }
    return view('posts.show', compact('post'));
}


    public function destroy(Post $post)
    {
        $user = Auth::user();
        if ($post->canBeDeletedBy($user)) {
            $post->update([
                'czy_usuniete' => 1,
                'kto_usunal' => $user->id_uzytkownika,
                'data_usuniecia' => now(),
            ]);
            return redirect()->route('posts.index')->with('success', 'Post usunięty');
        }
        return redirect()->route('posts.index')->with('error', 'Nie masz uprawnień do usunięcia tego posta.');
    }
}
