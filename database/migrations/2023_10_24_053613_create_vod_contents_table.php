<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\VodStatus;
use App\Enums\ContentVisibility;
use App\Enums\ContentAgeLimit;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vod_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('channel_id');

            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('image_url')->nullable();

            $table->string('content_id')->unique();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->integer('file_size')->default(0);
            $table->integer('duration')->default(0);

            $table->string('url')->nullable();
            $table->string('stream_url')->nullable();

            $table->string('md5sum')->nullable();
            $table->string('encoding_md5sum')->nullable();

            $table->enum('status', VodStatus::getKeys())->default(VodStatus::SETUP);
            $table->enum('visibility', ContentVisibility::getKeys())->default(ContentVisibility::PUBLIC);
            $table->enum('age_limit', ContentAgeLimit::getKeys())->default(ContentAgeLimit::ALL);

            $table->boolean('allow_comment')->default(true);
            $table->boolean('allow_embedding')->default(true);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('channel_id')->references('id')->on('channels');

            $table->index(['status', 'visibility', 'age_limit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vod_contents');
    }
};
