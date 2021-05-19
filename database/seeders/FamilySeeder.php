<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Family;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Family::create(["number" => 1234567890123456]);
    }
}
