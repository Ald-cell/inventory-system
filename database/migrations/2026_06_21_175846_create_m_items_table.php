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
    Schema::create('m_items', function (Blueprint $table) {

        $table->id('item_id');

        $table->string('item_name');

        $table->string('unit');

        $table->unsignedBigInteger('item_type_id');

        $table->timestamps();

        $table->foreign('item_type_id')
              ->references('item_type_id')
              ->on('m_item_types')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_items');
    }
};
