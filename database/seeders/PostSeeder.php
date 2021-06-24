<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Post, Tag};
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        Post::factory(50)->create();
        Post::all()->each(function ($post) use ($faker) {
            $tags = [];
            for($i = 0; $i < 3; $i++){
                $tags[] = Tag::firstOrCreate(
                    ['slug' => Str::slug($faker->sentence(1))],
                    ['name' => $faker->sentence(1)]
                )->id;
            }
            $post->tags()->attach($tags);
        });
    }
}
