<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    if (!Schema::hasTable('t_inventory_room')) {

        Schema::create('t_inventory_room', function (Blueprint $table) {

            $table->id('inventory_room_id');

            $table->string('status')->default('Used');

            $table->date('inventory_date');

            $table->unsignedBigInteger('inventory_id');

            $table->unsignedBigInteger('room_id');

            $table->timestamps();

            $table->foreign('inventory_id')
                  ->references('inventory_id')
                  ->on('t_inventory')
                  ->onDelete('cascade');

            $table->foreign('room_id')
                  ->references('room_id')
                  ->on('m_rooms')
                  ->onDelete('cascade');

        });

    }
}

    public function down(): void
    {
        Schema::dropIfExists('t_inventory_room');
    }
};