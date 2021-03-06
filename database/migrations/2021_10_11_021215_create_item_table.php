<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string("nama_item");
            $table->string("satuan");
            $table->string("keterangan");
            $table->integer("current_stock");
            $table->integer("minimal_stock");
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
        Schema::table('item', function (Blueprint $table) {
            //
            $table->dropColumn('nama_item');
            $table->dropColumn('satuan');
            $table->dropColumn('keterangan');
            $table->dropColumn('current_stock');
            $table->dropColumn('minimal_stock');
        });
    }
}
