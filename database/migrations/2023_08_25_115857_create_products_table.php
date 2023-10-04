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
            $table->string('title')->uniqid();
            $table->string('thumb')->uniqid();
            $table->string('slug_url')->uniqid();
            $table->integer('price')->nullable();
            $table->integer('price_sale')->nullable();
            $table->integer('menu_id');
            $table->integer('is_active');
            $table->integer('size')->nullable();
            $table->integer('sale')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_color')->nullable();
            $table->longText('content')->nullable();
            $table->timestamps();
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