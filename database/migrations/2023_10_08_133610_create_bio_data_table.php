<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bio_data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('passport_number')->unique();
            $table->string('passport');
            $table->string('gender');
            $table->date('birthday');
            $table->string('lga');
            $table->string('phone')->unique();
            $table->string('place_of_birth');
            $table->text('address');
            $table->string('town');
            $table->string('occupation');
            $table->string('height');
            $table->string('next_of_kin');
            $table->string('next_of_kin_phone');
            $table->string('marital_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bio_data');
    }
};