<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('city_id');
            $table->integer('user_id');
            $table->string('street_name');
            $table->string('house_no');
            $table->string('house_building')->nullable();
            $table->string('postcode')->nullable();
            $table->string('lat');
            $table->string('lon');
            $table->boolean('active')->default(0);
            $table->boolean('is_approved')->default(0);
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
        Schema::dropIfExists('houses');
    }
}
