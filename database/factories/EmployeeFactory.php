<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeeFactory extends Factory
{
    protected $model = \App\Models\Employee::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->sentence(10),
            'location' => $this->faker->city(),
            'skills' => $this->faker->words(5, true),
            'experience' => $this->faker->numberBetween(1, 10) . ' years',
            'education' => $this->faker->sentence(3),
            'file' => 'resume.pdf',
            'password' => bcrypt('password'),
        ];
    }
}
