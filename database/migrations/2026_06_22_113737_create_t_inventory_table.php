<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('t_inventory', function (Blueprint $table) {

        $table->id('inventory_id');

        $table->unsignedBigInteger('item_id');

        $table->unsignedBigInteger('room_id');

        $table->integer('qty');

        $table->string('condition')->default('Baik');

        $table->timestamps();

        $table->foreign('item_id')
              ->references('item_id')
              ->on('m_items')
              ->onDelete('cascade');

        $table->foreign('room_id')
              ->references('room_id')
              ->on('m_rooms')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_inventory');
    }
};
