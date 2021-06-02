<?php

namespace Database\Factories;

use App\Models\{Citizen, Family};
use Illuminate\Database\Eloquent\Factories\Factory;

class CitizenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Citizen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'family_id' => Family::firstOrCreate(['number' => rand(1111111111111111, 9999999999999999)])->id,
            'nik' => $this->faker->unique()->numberBetween(1111111111111111, 9999999999999999),
            'name' => $this->faker->name,
            'no_hp' => $this->faker->e164PhoneNumber,
            'birthday' => $this->faker->date,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement($array = array('L','P')),
        ];
    }
}
