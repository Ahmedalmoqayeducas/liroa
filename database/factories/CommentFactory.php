<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id'=>fake()->numberBetween(1,User::count()),
            'post_id'=>fake()->numberBetween(1,10),
            'content'=>fake()->text(100),
            'created_at'=>fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
