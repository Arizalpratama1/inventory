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
            $table->unsignedBigInteger("item_id");
            $table->unsignedBigInteger("unit_id");
            $table->unsignedBigInteger("jenis_mesin_id");
            $table->timestamps();
            
            $table->foreign("item_id")->references("id")->on("item");
            $table->foreign("unit_id")->references("id")->on("unit");
            $table->foreign("jenis_mesin_id")->references("id")->on("jenis_mesin");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_relation');
    }
}
