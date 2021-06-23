<?php

namespace Database\Seeders;

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
        $this->call([
            RoleSeeder::class,
            CitizenSeeder::class,
            CategorySeeder::class,
            VillageInfoSeeder::class,
            UserSeeder::class,
            SliderSeeder::class,
            PostSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
