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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id(); // ID karyawan sebagai primary key
            $table->string('name'); // Nama karyawan
            $table->string('position'); // Posisi/jabatan karyawan
            $table->string('image')->nullable(); // Foto karyawan, nullable
            $table->timestamps(); // Created at dan updated at secara otomatis  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
