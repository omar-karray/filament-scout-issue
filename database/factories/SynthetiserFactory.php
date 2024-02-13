<?php

namespace Database\Factories;

use App\Models\Synthetiser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Synthetiser>
 */
class SynthetiserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Synthetiser::class;
    public function definition(): array
    {
        return [
            //
            'name' => fake('en')->name(),
            'description' => fake('en')->text()
        ];
    }
}
