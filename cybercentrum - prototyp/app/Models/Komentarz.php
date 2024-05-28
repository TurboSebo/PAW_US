<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Komentarz extends Model
{
    use HasFactory;
    
    protected $table = 'komentarze';
    protected $primaryKey = 'id_komentarza';
    public $timestamps = false;

    protected $fillable = [
        'id_uzytkownika',
        'id_posta',
        'tresc',
        'data_wstawienia',
        'czy_usuniete',
        'kto_usunal',
        'data_usuniecia'
    ];

    public function user(){ //definicja relacji między komentarzem a użytkownikiem 
        return $this->belongsTo(User::class, 'id_uzytkownika', 'id_uzytkownika');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'id_posta', 'id_posta');
    }
//sprawdza uprawnienia czy może usunąć komentarz
    public function canBeDeletedBy(User $user){
        if ($user->isAdmin()) {
            return true;
        }
        if ($user->isModerator() && !$this->user->isModerator() && !$this->user->isAdmin()) {
            return true;
        }
        return $this->id_uzytkownika == $user->id_uzytkownika;
    }
}