<?php

use App\Models\User;
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
        Schema::create('umrah_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('transaction_id');
            $table->integer('amount');
            $table->string('date');
            $table->string('status');
            $table->string('resource');
            $table->string('RRR');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umrah_payments');
    }
};