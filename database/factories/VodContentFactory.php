<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\VodStatus;
use App\Enums\ContentVisibility;
use App\Enums\ContentAgeLimit;
use App\Models\VodContent;
use App\Models\Channel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VodContent>
 */
class VodContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $contentId = VodContent::generateContentId();
        $channel = Channel::inRandomOrder()->first();

        return [
            'user_id' => $channel->user_id,
            'channel_id' => $channel->id,
            'title' => fake()->sentence(6),
            'desc' => fake()->paragraph(3),
            'image_url' => fake()->imageUrl(640, 360),
            'content_id' => $contentId,
            'file_path' => null,
            'file_name' => null,
            'file_size' => rand(1000000, 100000000),
            'duration' => rand(60, 3600),
            'url' => url("/vod/{$contentId}"),
            'stream_url' => url("/vod/{$contentId}/stream"),
            'md5sum' => null,
            'encoding_md5sum' => null,
            'status' => VodStatus::SETUP->value,
            'visibility' => ContentVisibility::PUBLIC->value,
            'age_limit' => ContentAgeLimit::ALL->value,
            'allow_comment' => true,
            'allow_embedding' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function uploading(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => VodStatus::UPLOADING->value,
        ]);
    }

    public function encoding(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => VodStatus::ENCODING->value,
        ]);
    }

    public function complete(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => VodStatus::COMPLETE->value,
        ]);
    }

    public function failed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => VodStatus::FAILED->value,
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
