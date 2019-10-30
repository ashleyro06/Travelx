<?php

use Illuminate\Database\Seeder;

class ViajeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Viaje', 2)->create();
    }
}
