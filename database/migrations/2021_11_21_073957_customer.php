<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('fullName');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('taxTitle');
            $table->string('tax');
            $table->string('taxNumber');
            $table->string('taxAddress');
            $table->boolean('is_einvoice')->default(0);
            $table->boolean('is_status')->default(0);
            $table->uuid('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
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
        //
    }
}
