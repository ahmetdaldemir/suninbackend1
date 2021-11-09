<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Service extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('service_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->uuid('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('lang_id');
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_languages');
    }
}
