<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkshopidToWarehouseItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('warehouses_items', function (Blueprint $table) {
            $table->foreignId('workshop_id')->after('name')->references('id')->on('workshops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('warehouses_items', function (Blueprint $table) {
            $table->dropIfExists('workshop_id');
        });
    }
}
