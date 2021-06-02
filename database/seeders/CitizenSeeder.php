<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Citizen;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Citizen::factory(20)->create();
    }
}
