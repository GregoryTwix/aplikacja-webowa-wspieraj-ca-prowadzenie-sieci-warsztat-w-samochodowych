<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkshopIdToDelivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivers', function (Blueprint $table) {
            $table->foreignId('workshop_id')->after('address')->references('id')->on('workshops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivers', function (Blueprint $table) {
            $table->dropIfExists('workshop_id');
        });
    }
}
