<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageInfo;

class VillageInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VillageInfo::create([
            'name' => 'Desa Kita',
            'description' => 'Lorem ipsum dolor amet',
            'address' => 'Depok',
            'no_hp' => '02198918181',
            'email' => 'desa@gmail.com',
            'start_day' => 'senin',
            'end_day' => 'selasa',
            'start_time' => '08:00',
            'end_time' => '17:00'
        ]);
    }
}
