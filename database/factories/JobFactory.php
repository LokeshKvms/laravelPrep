<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $base = fake()->numberBetween(20, 199);
        $salary = $base * 500;
        return [
            //
            'title'=> fake()->jobTitle(),
            'employer_id'=>Employer::factory(),
            'salary'=> '₹'.$salary,
        ];
    }
}
