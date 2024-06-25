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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedTinyInteger('payment_id');
            $table->unsignedTinyInteger('shipping_id');
            $table->unsignedFloat('payment_cost', 64, 2)->default('0.00');
            $table->unsignedFloat('shipping_cost', 64, 2)->default('0.00');
            $table->unsignedFloat('tax', 64, 2)->default('0.00');
            $table->unsignedFloat('subtotal', 64, 2);
            $table->unsignedFloat('total', 64, 2);
            $table->string('email')->nullable();
            $table->string('customer_name')->nullable();
            $table->json('shipping_address')->nullable();
            $table->json('billing_address')->nullable();
            $table->string('phone');
            $table->json('guest_info')->nullable();
            $table->unsignedTinyInteger('status_id')->default(1);
            $table->timestamps();

            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('shipping_id')->references('id')->on('shippings');
            $table->foreign('status_id')->references('id')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
