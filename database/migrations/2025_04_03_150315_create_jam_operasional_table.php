<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jam_operasional', function (Blueprint $table) {
            $table->id();
            $table->string('day'); // Hari dalam seminggu
            $table->time('open_time'); // Jam buka
            $table->time('close_time'); // Jam tutup
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jam_operasional');
    }
};
