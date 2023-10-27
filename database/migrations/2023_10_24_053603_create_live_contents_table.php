<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\LiveStatus;
use App\Enums\ContentVisibility;
use App\Enums\ContentAgeLimit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('live_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('channel_id');

            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('image_url')->nullable();

            $table->boolean('is_locked')->default(false);
            $table->string('lock_password')->nullable();

            $table->enum('status', LiveStatus::getKeys())->default(LiveStatus::STANDBY);
            $table->enum('visibility', ContentVisibility::getKeys())->default(ContentVisibility::PUBLIC);
            $table->enum('age_limit', ContentAgeLimit::getKeys())->default(ContentAgeLimit::ALL);

            $table->timestamps();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('ended_at')->nullable();

            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('channel_id')->references('id')->on('channels');

            $table->index(['status', 'visibility', 'age_limit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_contents');
    }
};
