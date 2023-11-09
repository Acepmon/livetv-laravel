<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Enums\LiveStatus;
use App\Enums\ContentVisibility;
use App\Enums\ContentAgeLimit;
use App\Models\Channel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LiveContent>
 */
class LiveContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $channel = Channel::inRandomOrder()->first();

        return [
            'user_id' => $channel->user_id,
            'channel_id' => $channel->id,
            'title' => fake()->sentence(6),
            'desc' => fake()->paragraph(3),
            'image_url' => fake()->imageUrl(640, 360),
            'is_locked' => false,
            'lock_password' => null,
            'status' => LiveStatus::STANDBY->value,
            'visibility' => ContentVisibility::PUBLIC->value,
            'age_limit' => ContentAgeLimit::ALL->value,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function locked(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_locked' => true,
            'lock_password' => Hash::make('password'),
        ]);
    }

    public function live(): static
    {
        $startedAt = now()->addDays(-1);

        return $this->state(fn (array $attributes) => [
            'status' => LiveStatus::STARTED->value,
            'started_at' => $startedAt,
            'ended_at' => null,
        ]);
    }

    public function ended(): static
    {
        $startedAt = now()->addDays(-2);
        $endedAt = $startedAt->addDays(1);

        return $this->state(fn (array $attributes) => [
            'status' => LiveStatus::ENDED->value,
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
        ]);
    }

    public function public(): static
    {
        return $this->state(fn (array $attributes) => [
            'visibility' => ContentVisibility::PUBLIC->value,
        ]);
    }

    public function private(): static
    {
        return $this->state(fn (array $attributes) => [
            'visibility' => ContentVisibility::PRIVATE->value,
        ]);
    }

    public function subscriber(): static
    {
        return $this->state(fn (array $attributes) => [
            'visibility' => ContentVisibility::SUBSCRIBER->value,
        ]);
    }

    public function premium(): static
    {
        return $this->state(fn (array $attributes) => [
            'visibility' => ContentVisibility::PREMIUM->value,
        ]);
    }

    public function adult(): static
    {
        return $this->state(fn (array $attributes) => [
            'age_limit' => ContentAgeLimit::ADULT->value,
        ]);
    }
}
