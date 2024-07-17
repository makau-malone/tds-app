<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->unique()->nullable();
            $table->string('panoramic_1')->nullable();
            $table->string('panoramic_2')->nullable();
            $table->string('panoramic_3')->nullable();
            $table->string('panoramic_4')->nullable();
            $table->string('panoramic_5')->nullable();
            $table->string('std_img_1')->nullable();
            $table->string('std_img_2')->nullable();
            $table->string('std_img_3')->nullable();
            $table->string('std_img_4')->nullable();
            $table->string('std_img_5')->nullable();
            $table->string('std_img_6')->nullable();
            $table->string('std_img_7')->nullable();
            $table->string('std_img_8')->nullable();
            $table->string('std_img_9')->nullable();
            $table->string('std_img_10')->nullable();          
            
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
        Schema::dropIfExists('project_images');
    }
}
