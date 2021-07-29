<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
          "email" => "admin@user.com",
          "name" => "Admin",
          "password" => Hash::make("password")
        ]);

        $spain = \App\Models\Vokabel::create(["word" => "hola"]);
        $german = \App\Models\Vokabel::create(["word" => "Halo"]);
        $spain->answers()->attach($german);
        $german->answers()->attach($spain);

        $spain = \App\Models\Vokabel::create(["word" => "casa"]);
        $german = \App\Models\Vokabel::create(["word" => "Haus"]);
        $spain->answers()->attach($german);
        $german->answers()->attach($spain);

        $spain = \App\Models\Vokabel::create(["word" => "cuchara"]);
        $german = \App\Models\Vokabel::create(["word" => "Löffel"]);
        $spain->answers()->attach($german);
        $german->answers()->attach($spain);

        $spain = \App\Models\Vokabel::create(["word" => "tenedor"]);
        $german = \App\Models\Vokabel::create(["word" => "Gabel"]);
        $spain->answers()->attach($german);
        $german->answers()->attach($spain);

        $spain = \App\Models\Vokabel::create(["word" => "estar"]);
        $german = \App\Models\Vokabel::create(["word" => "ist"]);
        $spain->answers()->attach($german);
        $german->answers()->attach($spain);
    }
}
