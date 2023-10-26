<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->userName(),

            'email' => fake()->unique()->email(),
            'email_verified_at' => now(),
            'password' => bcrypt('khanhan2003'),
            'role' => fake()->randomElement(['user', 'vendor', 'admin']),
            'status' => 'active',
            'remember_token' => Str::random(10),
        ];
    }
    // 'name' => $this->faker->name(),
    // 'gender' => $this->faker->randomElement(['Nam', 'Nữ']),
    // 'phone' => $this->faker->phoneNumber(),
    // 'address' => $this->faker->address(),
    // 'image' => $this->faker->image()


    // [
    //     'name' => 'Vendor user',
    //     'username' => 'vendoruser',
    //     'email' => 'vendor@gmail.com',
    //     'role' => 'vendor',
    //     'status' => 'active',
    //     'password' => bcrypt('khanhan2003')
    // ],
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
