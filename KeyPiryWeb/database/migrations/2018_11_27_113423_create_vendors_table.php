<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string("business_name")->nullable();
            $table->string("business_phone", 15)->nullable();
            $table->string("tax_number")->nullable();
            $table->string("country_code")->nullable();
            $table->decimal('vendor_balance', 18, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('restrict');
        });
        DB::update('ALTER TABLE vendors AUTO_INCREMENT = 1001;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
