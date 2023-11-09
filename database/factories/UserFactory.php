<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Enums\UserRole;
use Faicchia\BoringAvatars\BoringAvatar;

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
        $name = fake()->name();
        $avatar = BoringAvatar::make()
            ->size(60)
            ->variant('beam')
            ->name($name)
            ->colors(['#f97316', '#FFB238', '#FFE7BF'])
            ->url();

        return [
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'avatar_url' => $avatar ?? url('/assets/images/default-avatar.svg'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function verified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => now(),
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRole::ADMIN,
        ]);
    }

    public function creator(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRole::CREATOR,
        ]);
    }

    public function user(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRole::USER,
        ]);
    }
}
