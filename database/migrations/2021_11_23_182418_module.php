<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Module extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('module');//Kategoriller modülü
            $table->string('class');//categories
            $table->tinyInteger('type');//1 or 0
            $table->uuid('status');//1 or 0
            $table->softDeletes();

        });

        Schema::create('rent_module', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('module_id');
            $table->string('tenant_id');
            $table->string('name');//categories
            $table->string('class');//categories
            $table->string('content');//modül içeriği json
            $table->string('type');//içerik(content), ürünlistesi(product), vs vs...
            $table->uuid('status');//1 or 0
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onUpdate('cascade')->onDelete('cascade');
            $table->softDeletes();

        });

        Schema::create('module_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');//
            $table->text('description');
            $table->string('seo');
            $table->uuid('module_id');
            $table->uuid('lang_id');
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onUpdate('cascade')->onDelete('cascade');
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
        //
    }
}
