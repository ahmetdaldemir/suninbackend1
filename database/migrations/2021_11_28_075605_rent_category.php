<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RentCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->uuid('tenant_id');
            $table->uuid('category_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('rent_categories_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('seo');
            $table->string('name');//
            $table->text('description');
            $table->uuid('rent_category_id');
            $table->uuid('lang_id');
            $table->string('meta');
            $table->text('tags');
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rent_category_id')->references('id')->on('rent_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_categories');
        Schema::dropIfExists('rent_categories_languages');
    }
}
