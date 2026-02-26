<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'title'   => fake()->sentence(3), 
            'content' => fake()->paragraph(), 
            'status'  => fake()->randomElement(['active', 'closed']),
            'created_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}