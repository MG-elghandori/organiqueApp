<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insérer les valeurs par défaut
        DB::table('finances')->insert([
            'compteCIH' => 0,
            'compteTIJARI' => 0,
            'echopping' => 0,
            'Credit' => 0,
            'argent' => 0
        ]);
    }
}
