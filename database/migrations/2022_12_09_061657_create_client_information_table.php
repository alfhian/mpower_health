<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_information', function (Blueprint $table) {
            $table->string('client_id', 10);
            $table->binary('firstname');
            $table->binary('lastname');
            $table->string('verified_status', 1)->default('Y');
            $table->date('birthdate');
            $table->string('phone_code', 6);
            $table->binary('phone_number');
            $table->binary('street_address');
            $table->binary('street_address_2');
            $table->binary('city');
            $table->binary('state_province')->nullable();
            $table->binary('postal_code');
            $table->binary('country');
            $table->text('personal_information')->nullable();
            $table->string('user_input', 50)->nullable();
            $table->string('user_update', 50)->nullable();
            $table->string('user_delete', 50)->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('client_information');
    }
};
