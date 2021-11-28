<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');//
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('rent_pages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');//
            $table->uuid('tenant_id');
            $table->uuid('page_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('rent_page_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('seo');
            $table->string('name');//
            $table->text('description');
            $table->uuid('rent_page_id');
            $table->uuid('lang_id');
            $table->string('meta');
            $table->text('tags');
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rent_page_id')->references('id')->on('rent_pages')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pages');
    }
}
