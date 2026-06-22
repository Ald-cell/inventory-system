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
    Schema::create('t_inventory_transactions', function (Blueprint $table) {

        $table->id('inventory_transaction_id');

        $table->date('transaction_date');

        $table->string('transaction_number')->unique();

        $table->string('status')->default('Pending');

        $table->date('start_date')->nullable();

        $table->date('end_date')->nullable();

        $table->string('evidence_file')->nullable();

        $table->string('source_of_founds')->nullable();

        $table->decimal('total_budget', 15, 2)->default(0);

        $table->decimal('budget_realization', 15, 2)->default(0);

        $table->unsignedBigInteger('transaction_type_id');

        $table->timestamps();

        $table->foreign('transaction_type_id')
              ->references('transaction_type_id')
              ->on('m_transaction_types')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_inventory_transactions');
    }
};
