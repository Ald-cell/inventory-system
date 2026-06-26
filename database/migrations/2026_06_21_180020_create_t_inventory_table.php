<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('t_inventory')) {

            Schema::create('t_inventory', function (Blueprint $table) {

                $table->id('inventory_id');

                $table->integer('quantity')->default(0);

                $table->decimal('price', 15, 2)->default(0);

                $table->text('specification')->nullable();

                $table->string('status')->default('Available');

                $table->string('foto')->nullable();

                $table->text('description')->nullable();

                $table->string('merk')->nullable();

                $table->string('barcode')->nullable();

                $table->date('expired_date')->nullable();

                $table->unsignedBigInteger('item_id');

                $table->unsignedBigInteger('inventory_transaction_id');

                $table->timestamps();

                $table->foreign('item_id')
                      ->references('item_id')
                      ->on('m_items')
                      ->onDelete('cascade');

                $table->foreign('inventory_transaction_id')
                      ->references('inventory_transaction_id')
                      ->on('t_inventory_transactions')
                      ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('t_inventory');
    }
};