<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
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
            'emp_name' => $this->faker->name(),
            'employment_name' => $this->faker->jobTitle(),
            'email' => $this->faker->unique()->safeEmail(),
            'description' => $this->faker->paragraph(3), // وصف طويل
            // 'picture' => $this->faker->imageUrl(200, 200, 'people'), // صورة شخصية
            'phone' => $this->faker->phoneNumber(), // الهاتف قد يكون فارغًا
            'facebook' => $this->faker->url(), // رابط الفيسبوك
            'linked_in' => $this->faker->url(), // رابط لينكد إن
        ];
    }
}
