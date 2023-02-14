<?php

namespace Database\Factories;

use App\Models\Man;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Man>
 */
class ManFactory extends Factory
{
    protected $model = Man::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'account_number'=>random_int(100000000, 999999999),
            'balance'=>random_int(50, 200),
            ];
    }
}
