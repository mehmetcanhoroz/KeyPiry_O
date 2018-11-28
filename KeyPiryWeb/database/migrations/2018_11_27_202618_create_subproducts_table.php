<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('vendor_id')
                ->references('id')->on('vendors')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('restrict');
        });

        DB::update('ALTER TABLE subproducts AUTO_INCREMENT = 1001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subproducts');
    }
}
