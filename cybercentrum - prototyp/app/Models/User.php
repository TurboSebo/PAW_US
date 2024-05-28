<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_uzytkownika';

    protected $table = 'uzytkownicy'; //tabela nazywa się użytkownicy w mojej bazie danych

    //pobierze odpowiednie dane

    public function getAuthPassword()
    {
        return $this->haslo;
    }
    public function getAuthIdentifierName()
    {
        return 'nazwa_uzytkownika';
    }
 
        public $timestamps = false; //wyłącza automatyczne zarządzanie polami created_at i updated_at przez Eloquent. 

 //zmienna fillable to atrybuty które mogą być masowo przypisywane
    protected $fillable = [
        'nazwa_uzytkownika',
        'email',
        'haslo',
        'rola',
        'konto_aktywne',
        'data_dezaktywacji'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [  //atrubuty będą ukryte podczas serializacji do JSON
        'haslo',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'haslo' => 'hashed',
    ];

    //rejestracja
    public static function registerUser($data){

        $user = self::create([
            'nazwa_uzytkownika' => $data['nazwa_uzytkownika'],
            'email' => $data['email'],
            'haslo' => Hash::make($data['password']),
        ]);

        // Dodajemy nowy rekord do tabeli role_uzytkownikow
        DB::table('role_uzytkownikow')->insert([
            'id_roli' => 3, // Ustawiamy id_roli na 3 czyli użytkownik
            'id_uzytkownika' => $user->id_uzytkownika, // Używamy id nowo utworzonego użytkownika
            'kto_nadal' => $user->id_uzytkownika, // id utworzonego użytkownika będzie w kolumnie kto_nadal
            'data_nadania' => now(), // data ustawiona na obecną datę
        ]);

        return $user; //zwracanie na razie nie potrzebne
    }
        //role
    public function isAdmin(){
        return $this->rola == 1;
    }

    public function isModerator(){
        return $this->rola == 2;
    }

    public function isActive(){
        return $this->konto_aktywne == 1;
    }
    public function komentarze(){
            return $this->hasMany(Komentarz::class, 'id_uzytkownika', 'id_uzytkownika');
        }
}