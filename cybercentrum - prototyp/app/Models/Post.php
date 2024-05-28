<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posty';
    protected $primaryKey = 'id_posta';
    protected $fillable = [
        'tytul_posta',
        'tresc',
        'id_uzytkownika',
        'czy_usuniete',
        'kto_usunal',
        'data_usuniecia'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_uzytkownika');
    }

    public function komentarze()
    {
        return $this->hasMany(Komentarz::class, 'id_posta', 'id_posta');
    }

    public function canBeDeletedBy(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
        if ($user->isModerator() && !$this->user->isModerator() && !$this->user->isAdmin()) {
            return true;
        }
        return $this->id_uzytkownika == $user->id_uzytkownika;
    }
}
