<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('slug');
            $table->unsignedTinyInteger('category_id');
            $table->string('excerpt_en')->nullable();
            $table->string('excerpt_id')->nullable();
            $table->text('content_en', 10000);
            $table->text('content_id', 10000)->nullable();
            $table->string('thumbnail')->nullable();
            $table->unsignedInteger('reads')->default(0);
            $table->unsignedFloat('time_read', 5, 2)->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->boolean('enabled')->default(1);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
