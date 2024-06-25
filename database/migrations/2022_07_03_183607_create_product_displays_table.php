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
        Schema::create('product_displays', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->boolean('featured')->default(0);
            $table->boolean('new')->default(0);;
            $table->boolean('promotion')->default(0);
            $table->boolean('show_stock')->default(0);
            $table->boolean('hide_price')->default(0);
            $table->boolean('hide_options')->default(0);
            $table->boolean('hide_excerpt')->default(0);
            $table->boolean('hide_description')->default(0);
            $table->boolean('hide_reviews')->default(0);
            $table->boolean('hide_features')->default(0);
            $table->boolean('hide_specifications')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_displays');
    }
};