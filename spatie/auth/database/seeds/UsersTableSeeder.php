<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'nom' => 'Ouaret',
            'prenom' => 'Nabil',
            'numero_tel' => '+213558',
            'service' => 'Système d\'information',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'role_id' => 2,
            'nom' => 'Nacer',
            'prenom' => 'Thinhinane',
            'numero_tel' => '+213560208116',
            'service' => 'Production',
            'email' => 'thinhinane.nacer@digduislinkalgeria.net',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'role_id' => 3,
            'nom' => 'Bendjebbar',
            'prenom' => 'Loubna',
            'numero_tel' => '+213550902702',
            'service' => 'Gestionnaire de stock et achat',
            'email' => 'bendjebbar.loubna@digiuslinkalgeria.net',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'role_id' => 4,
            'nom' => 'Mimoune',
            'prenom' => 'Fahima',
            'numero_tel' => '+213550902702',
            'service' => 'Commercial',
            'email' => 'mimoune.fahima@digiuslinkalgeria.net',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'role_id' => 5,
            'nom' => 'Amrouch',
            'prenom' => 'Lamiss',
            'numero_tel' => '+213558757779',
            'service' => 'QHSE',
            'email' => 'fl_amrouch@esi.dz',
            'password' => bcrypt('12345678'),
        ]);
        DB::table('users')->insert([
            'role_id' => 6,
            'nom' => 'Reparateur',
            'prenom' => 'Widad',
            'numero_tel' => '+213558878809',
            'service' => 'Réparation électronique',
            'email' => 'fw_dekkiche@esi.dz',
            'password' => bcrypt('12345678'),
        ]);
    }
}
