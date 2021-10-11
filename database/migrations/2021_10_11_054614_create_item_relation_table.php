<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_relation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('item');
            $table->foreignId('unit_id')->constrained('unit');
            $table->foreignId('jenis_mesin_id')->constrained('jenis_mesin');
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
        Schema::table('item_relation', function (Blueprint $table) {
            //
            $table->dropColumn('item_id');
            $table->dropColumn('unit_id');
            $table->dropColumn('jenis_mesin_id');
        });
    }
}
