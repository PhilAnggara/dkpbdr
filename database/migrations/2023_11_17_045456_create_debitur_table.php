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
        Schema::create('debitur', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_fintech');
            $table->string('nama');
            $table->string('grup');
            $table->integer('plafond_all');
            $table->integer('plafond_bdr');
            $table->date('tanggal_cair');
            $table->integer('jangka_waktu');
            $table->string('sistem_pembayaran');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debitur');
    }
};
