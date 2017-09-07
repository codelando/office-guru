<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_service', function (Blueprint $table) {
            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')
                ->on('locations')->onDelete('cascade');

            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign('service_id')->references('id')
                ->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('location_service');
    }
}
