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
            $table->text('npwp')->nullable();
            $table->string('bidang_usaha');
            $table->text('akta_pendirian')->nullable();
            $table->text('akta_pengesahan')->nullable();
            $table->text('akta_perubahan_terakhir')->nullable();
            $table->text('akta_pengesahan2')->nullable();
            $table->text('siup')->nullable();
            $table->text('nib')->nullable();
            $table->string('nama_1');
            $table->string('jabatan_1');
            $table->text('ktp_1')->nullable();
            $table->text('npwp_1')->nullable();
            $table->string('nama_2');
            $table->string('jabatan_2');
            $table->text('ktp_2')->nullable();
            $table->text('npwp_2')->nullable();
            $table->string('nama_3');
            $table->string('jabatan_3');
            $table->text('ktp_3')->nullable();
            $table->text('npwp_3')->nullable();
            $table->string('nama_4');
            $table->string('jabatan_4');
            $table->text('ktp_4')->nullable();
            $table->text('npwp_4')->nullable();
            $table->string('nama_5');
            $table->string('jabatan_5');
            $table->text('ktp_5')->nullable();
            $table->text('npwp_5')->nullable();
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
