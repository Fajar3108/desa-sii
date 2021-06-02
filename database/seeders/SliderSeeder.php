<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while ($i <= 5) {
            Slider::create([
                "image" => "https://raw.githubusercontent.com/darektoa/village-website/main/src/assets/images/profile/slide_$i.jpeg",
            ]);
            $i++;
        }
    }
}
