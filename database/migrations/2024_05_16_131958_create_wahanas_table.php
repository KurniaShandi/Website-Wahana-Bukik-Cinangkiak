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
        Schema::create('wahanas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wahana', 100)->notNullable();
            $table->text('deskripsi');
            $table->decimal('harga', 10, 2)->notNullable();
            $table->string('foto', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wahanas');
    }
};
