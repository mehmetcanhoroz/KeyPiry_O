<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('balance', 8, 2)->nullable();
            $table->string('mobile_number',15)->nullable();
            $table->text('billing_address')->nullable();
            $table->boolean("isVendor")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('balance', 8, 2);
            $table->dropColumn('mobile_number',15);
            $table->dropColumn('billing_address');
            $table->dropColumn("isVendor");
        });
    }
}
