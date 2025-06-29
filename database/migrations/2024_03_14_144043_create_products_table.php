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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name')->nullable();
            $table->string('pro_slug')->index();
            $table->longText('pro_content')->nullable();
            $table->integer('pro_category_id')->index()->default(0);
            $table->integer('pro_price')->default(0);
            $table->integer('pro_author_id')->default(0)->index();
            $table->integer('pro_sale')->default(0);
            $table->tinyInteger('pro_active')->default(1)->index();
            $table->tinyInteger('pro_hot')->default(0);
            $table->integer('pro_view')->default(0);
            $table->string('pro_description')->default(0);
            $table->string('pro_image')->nullable();
            $table->string('pro_title_seo')->nullable();
            $table->string('pro_description_seo')->nullable();
            $table->string('pro_keyword_seo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
