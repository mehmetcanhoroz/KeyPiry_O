<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent')->nullable();
            $table->string('title',191);

            $table->foreign('parent')
                ->references('id')->on('categories')
                ->onDelete('set null');
            //cascade
            //restrict
            //set null
            $table->timestamps();
        });
        //then set autoincrement to 1000
        DB::update('ALTER TABLE categories AUTO_INCREMENT = 1001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
