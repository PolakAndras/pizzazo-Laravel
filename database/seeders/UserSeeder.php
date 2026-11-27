<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Próba felhasználó feltöltése.
     *
     * DB::table()-t használok a User::create() helyett, mert a User modell
     * password mutatora újra bcrypt-elné a már hash-elt jelszót.
     * Így a korábbi Proba1 jelszava változatlanul működik.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('users')->insert([
            'name'           => 'Proba1',
            'email'          => 'proba1@gmail.com',
            'password'       => '$2y$10$XxV8TujQifKk7eBmgM.L6ewgISHVVj8kXJ.pX.wmMjluzXNjsRI4i',
            'phone'          => '+36301111111',
            'zip'            => '4400',
            'city'           => 'Nyíregyháza',
            'street'         => 'Bocskai út',
            'houseNumber'    => '10',
            'floor_door'     => '10101',
            'doorbell'       => '010101',
            'elseData'       => '010101',
            'accepted_terms' => true,
            'created_at'     => $now,
            'updated_at'     => $now,
        ]);
    }
}
