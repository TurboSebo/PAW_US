<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Użyj odpowiedniej przestrzeni nazw dla swojego modelu User

class zaszyfrujHasla extends Command
{
    protected $signature = 'update:passwords';

    protected $description = 'Update all user passwords to be hashed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Pobierz wszystkich użytkowników
        $users = User::all();

        foreach ($users as $user) {
            // Hashuj i zaktualizuj hasło
            $user->haslo = Hash::make($user->haslo);
            $user->save();
        }

        $this->info('Passwords updated successfully!');
    }
}