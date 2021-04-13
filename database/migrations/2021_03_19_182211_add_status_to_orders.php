<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('workshop_id');
            $table->integer('cost')->default(0)->after('status');
            $table->text('description')->after('cost');
            $table->text('staff_note')->default(0)->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIfExists('status');
            $table->dropIfExists('cost');
            $table->dropIfExists('description');
            $table->dropIfExists('staff_note');
        });
    }
}
