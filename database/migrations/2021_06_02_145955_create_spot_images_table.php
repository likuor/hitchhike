<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpotImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spot_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('spot_id')->unsigned();
            $table->foreign('spot_id')->references('id')->on('spots')->onDelete('cascade');;
            $table->string('path')->default('spots_images/noimage.png')->nullable();
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
        Schema::dropIfExists('spot_images');
    }
}
