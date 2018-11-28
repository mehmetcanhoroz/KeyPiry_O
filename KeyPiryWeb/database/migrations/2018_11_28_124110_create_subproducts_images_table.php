<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubproductsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subproducts_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->unsignedInteger('subproduct_id')->nullable();
            $table->timestamps();

            $table->foreign('subproduct_id')
                ->references('id')->on('subproducts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subproducts_images');
    }
}
