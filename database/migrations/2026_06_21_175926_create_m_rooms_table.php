<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_rooms', function (Blueprint $table) {

            $table->id('room_id');

            $table->string('room_name');

            $table->integer('floor');

            $table->unsignedBigInteger('building_id');

            $table->timestamps();

            $table->foreign('building_id')
                  ->references('building_id')
                  ->on('m_buildings')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_rooms');
    }
};