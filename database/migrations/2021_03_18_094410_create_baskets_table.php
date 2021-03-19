<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up(): void
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('baskets_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('basket_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity');
        });

        Schema::table('baskets_products', function (Blueprint $table) {
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('baskets');
        Schema::dropIfExists('baskets_products');
    }
}
