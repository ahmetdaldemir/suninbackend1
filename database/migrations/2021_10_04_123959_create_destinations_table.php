<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('parent_id')->index();
            $table->string('title');
//            $table->uuid('tenant_id')->index();
//            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

//        Schema::create('destination_languages', function (Blueprint $table) {
//            $table->uuid('id')->primary();
//            $table->string('title');
//            $table->string('description');
//            $table->string('image');
//            $table->uuid('language_id')->index();
//            $table->foreign('language_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
//            $table->uuid('destination_id')->index();
//            $table->foreign('destination_id')->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
//         });
//        Schema::create('destination_images', function (Blueprint $table) {
//            $table->uuid('id')->primary();
//            $table->string('image');
//            $table->uuid('destination_id')->index();
//            $table->foreign('destination_id')->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
//        Schema::dropIfExists('destination_images');
//        Schema::dropIfExists('destination_languages');
    }
}
