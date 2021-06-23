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
        $kk = ['3274567890123456', '3274567893122456', '3274567890223411', '3274567890123252', '3274567890133456', '3274567192123436', '3274527495123456', '3274567890124426'];
        return [
            'family_id' => Family::firstOrCreate(['number' => $kk[rand(0, count($kk) - 1)]])->id,
            'nik' => $this->faker->unique()->numberBetween(1111111111111111, 9999999999999999),
            'name' => $this->faker->name,
            'no_hp' => $this->faker->e164PhoneNumber,
            'birthday' => $this->faker->date,
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement($array = array('L','P')),
        ];
    }
}
