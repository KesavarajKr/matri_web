<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vieweds', function (Blueprint $table) {
            $table->id();
            $table->String('uservaran_id');
            $table->String('partner_varan_id');
            $table->integer('phn_num_view_status');
            $table->integer('image_view_status');
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
        Schema::dropIfExists('vieweds');
    }
}
