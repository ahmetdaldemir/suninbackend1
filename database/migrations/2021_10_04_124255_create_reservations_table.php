<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('villa_id');
            $table->foreign('villa_id')->references('id')->on('villas')->onUpdate('cascade')->onDelete('cascade');

            $table->uuid('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

            $table->date('checkin');
            $table->date('checkout');
            $table->string('days')->default(0);

            $table->string('fullname');
            $table->double('price',10,2);
            $table->double('deposit',10,2)->default(0);
            $table->double('rest',10,2)->default(0);

            $table->uuid('reservation_status_id');
            $table->foreign('reservation_status_id')->references('id')->on('reservation_status')->onUpdate('cascade')->onDelete('cascade');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
