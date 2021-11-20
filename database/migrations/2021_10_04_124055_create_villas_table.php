<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('villas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code');
            $table->string('type')->default(\App\Enums\VillaType::Villa);

            $table->string('capacity')->nullable();
            $table->string('rooms')->nullable();
            $table->string('pool')->default(\App\Enums\PoolType::Private);

            $table->string('bathrooms')->nullable();
            $table->string('bedrooms')->nullable();
            $table->float('clean_price',10,2)->nullable();
            $table->float('deposit',10,2)->nullable();

            $table->text('address')->nullable();
            $table->text('map')->nullable();

            $table->string('central_distance')->nullable();
            $table->string('restaurant_distance')->nullable();
            $table->string('plaj_distance')->nullable();
            $table->string('hospital_distance')->nullable();
            $table->string('market_distance')->nullable();
            $table->string('bus_station_distance')->nullable();
            $table->string('airport_distance')->nullable();

            $table->string('i_cal')->nullable();
            $table->string('video')->nullable();


            $table->uuid('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('owner_id');
            $table->foreign('owner_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');


            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('villa_languages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('seo');
            $table->uuid('villa_id');
            $table->uuid('lang_id');
            $table->foreign('lang_id')->references('id')->on('languages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('villa_contract', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('start_date');
            $table->date('finish_date');
            $table->float('price',10,2);
            $table->float('discount',10,2);
            $table->integer('min_rent_days');

            $table->string('period')->default(\App\Enums\RentPeriod::Day);

            $table->uuid('currency_id');
            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
        });


        Schema::create('villa_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('villa_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('villa_properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('villa_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade')->onDelete('cascade');
        });


        Schema::create('villa_regulations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');
            $table->uuid('regulation_id');
            $table->foreign('regulation_id')->references('id')->on('regulations')->onUpdate('cascade')->onDelete('cascade');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::dropIfExists('villas');
    }
}
