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
            $table->string('title',191)->nullable();

            $table->foreign('parent')
                ->references('id')->on('categories')
                ->onDelete('set null');
            //cascade
            //restrict
            //set null
            $table->smallInteger('sort')->default(0);
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_title')->nullable();
            $table->longText('details')->nullable();
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
