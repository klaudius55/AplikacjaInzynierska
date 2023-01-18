<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->word(),
            'created_at'=>$this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks'
            ),
            'updated_at'=>$this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks'
            ),
        ];
    }
}
