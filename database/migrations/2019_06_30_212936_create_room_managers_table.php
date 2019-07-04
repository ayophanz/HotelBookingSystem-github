<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_name');
            $table->bigInteger('hotel_id');
            $table->bigInteger('room_type_id');
            $table->string('room_image');
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
        Schema::dropIfExists('room_managers');
    }
}
