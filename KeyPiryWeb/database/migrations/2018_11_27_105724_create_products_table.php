<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string("name",191);
            $table->text("description")->nullable();
            $table->string("image",191)->nullable();
            $table->string("developer",191)->nullable();
            $table->string("publisher",191)->nullable();
            $table->string("genre",191)->nullable();
            $table->string("release_date",191)->nullable();
            $table->string("slug",191)->nullable();

            //$table->dropForeign('products_category_id_foreign');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
}
