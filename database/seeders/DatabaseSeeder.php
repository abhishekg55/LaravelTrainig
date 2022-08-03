<?php

namespace Database\Seeders;

use App\Models\MstCountry;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        MstCountry::factory(10)->create();
    }
}
