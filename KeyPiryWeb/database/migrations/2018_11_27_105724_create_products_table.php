<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('name',191)->nullable();
            $table->text('description')->nullable();
            $table->string('image',191)->nullable();
            $table->string('developer',191)->nullable();
            $table->string('publisher',191)->nullable();
            $table->string('genre',191)->nullable();
            $table->string('release_date',191)->nullable();
            $table->string('slug',191)->nullable();
            $table->boolean('status')->default(true);

            //$table->dropForeign('products_category_id_foreign');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('set null');
            //cascade
            //restrict
            //set null
            $table->timestamps();
        });
        //then set autoincrement to 1000
        DB::update('ALTER TABLE products AUTO_INCREMENT = 1001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');

        /*, function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        }*/
    }
}
