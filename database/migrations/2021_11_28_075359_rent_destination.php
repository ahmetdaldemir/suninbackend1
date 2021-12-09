<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RentDestination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_destinations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->uuid('tenant_id');
            $table->uuid('destination_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('rent_destinations_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('slug');
            $table->string('name');//
            $table->text('description')->nullable();
            $table->uuid('rent_destination_id');
            $table->uuid('lang_id');
            $table->string('meta');
            $table->text('tags');
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('rent_destination_id')->references('id')->on('rent_destinations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('rent_destinations');
        Schema::dropIfExists('rent_destinations_languages');
    }
}
