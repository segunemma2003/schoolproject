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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('family');
            $table->string('species');
            $table->string('yoruba');
            $table->string('hausa');
            $table->string('igbo');
            $table->string('common_name');
            $table->text('part_used');
            $table->text('medicinal_use');
            $table->text('picture')->nullable();
            $table->text('price');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
