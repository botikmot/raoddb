<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RaodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Raod::factory(500)->create();
    }
}
