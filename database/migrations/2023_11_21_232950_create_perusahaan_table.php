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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_debitur');
            $table->string('status_bh');
            $table->string('no_npwp');
            $table->text('npwp');
            $table->string('bidang_usaha');
            $table->text('akta_pendirian');
            $table->text('akta_pengesahan');
            $table->text('akta_perubahan_terakhir');
            $table->text('akta_pengesahan2');
            $table->text('siup');
            $table->text('nib');
            $table->string('nama_1');
            $table->string('jabatan_1');
            $table->text('ktp_1');
            $table->text('npwp_1');
            $table->string('nama_2');
            $table->string('jabatan_2');
            $table->text('ktp_2');
            $table->text('npwp_2');
            $table->string('nama_3');
            $table->string('jabatan_3');
            $table->text('ktp_3');
            $table->text('npwp_3');
            $table->string('nama_4');
            $table->string('jabatan_4');
            $table->text('ktp_4');
            $table->text('npwp_4');
            $table->string('nama_5');
            $table->string('jabatan_5');
            $table->text('ktp_5');
            $table->text('npwp_5');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
