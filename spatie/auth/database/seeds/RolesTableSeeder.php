<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nom' => 'Admin',
            'description' => 'Chargé des utilisateurs et privileges.'
        ]);
        DB::table('roles')->insert([
            'nom' => 'RProd',
            'description' => 'Chargé des ateliers et des alertes anomalies issues de la fabrication.'
        ]);
        DB::table('roles')->insert([
            'nom' => 'RStock',
            'description' => 'Chargé des alertes anomalies de source fournisseur.'
        ]);
        DB::table('roles')->insert([
            'nom' => 'RCommercial',
            'description' => 'Chargé des alertes anomalies de source clients.'
        ]);
        DB::table('roles')->insert([
            'nom' => 'RQHSE',
            'description' => 'Chargé du suivi et du controle qualité produits.'
        ]);
        DB::table('roles')->insert([
            'nom' => 'Reparateur',
            'description' => 'Chargé de la réparation des produits.'
        ]);
    }
}
