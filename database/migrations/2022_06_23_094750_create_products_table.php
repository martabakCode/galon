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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->string('excerpt');
            $table->unsignedTinyInteger('category_id');
            $table->unsignedTinyInteger('brand_id')->default(1);
            $table->unsignedInteger('stock');
            $table->unsignedFloat('buy_price', 64, 2)->default(0);
            $table->unsignedFloat('price', 64, 2)->default(0);
            $table->unsignedBigInteger('sort')->default(0);
            $table->text('description')->nullable();
            $table->boolean('enabled')->default(1);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
