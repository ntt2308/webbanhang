<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('oders', function (Blueprint $table) {
            $table->id();
            $table->integer('od_transaction_id')->index()->default(0);
            $table->integer('od_product_id')->index()->default(0);
            $table->tinyInteger('od_quantity')->default(0);
            $table->integer('od_price')->default(0);
            $table->tinyInteger('od_sale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oders');
    }
};
