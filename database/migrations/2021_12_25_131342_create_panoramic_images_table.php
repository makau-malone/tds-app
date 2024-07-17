<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanoramicImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panoramic', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->unique()->nullable();
            $table->string('panoramic_image')->nullable();
            $table->string('image_title')->nullable();
            $table->integer('hfov')->nullable();
            $table->double('pitch')->nullable();
            $table->double('yaw')->nullable();
            $table->string('type')->nullable();

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
        Schema::dropIfExists('panoramic');
    }
}
