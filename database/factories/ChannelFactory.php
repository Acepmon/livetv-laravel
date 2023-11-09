<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Enums\ChannelVisibility;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->sentence(2);
        $slug = Str::of($name)->slug('-');
        $user = User::factory()->verified()->creator()->create();

        return [
            'user_id' => $user->id,
            'name' => $name,
            'slug' => $slug,
            'desc' => fake()->paragraph(3),
            'image_url' => fake()->imageUrl(640, 360),
            'cover_url' => fake()->imageUrl(1280, 720),
            'visibility' => ChannelVisibility::VISIBLE->value,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function hidden(): static
    {
        return $this->state(fn (array $attributes) => [
            'visibility' => ChannelVisibility::HIDDEN->value,
        ]);
    }

    public function visible(): static
    {
        return $this->state(fn (array $attributes) => [
            'visibility' => ChannelVisibility::VISIBLE->value,
        ]);
    }
}
