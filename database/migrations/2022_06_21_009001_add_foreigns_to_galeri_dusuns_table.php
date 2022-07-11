<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToGaleriDusunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galeri_dusuns', function (Blueprint $table) {
            $table
                ->foreign('dusun_id')
                ->references('id')
                ->on('dusuns')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galeri_dusuns', function (Blueprint $table) {
            $table->dropForeign(['dusun_id']);
        });
    }
}
