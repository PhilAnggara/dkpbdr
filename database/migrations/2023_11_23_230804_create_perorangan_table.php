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
        Schema::create('perorangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_debitur');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('no_ktp');
            $table->text('ktp')->nullable();
            $table->string('no_npwp');
            $table->text('npwp')->nullable();
            $table->string('nama_ibu');
            $table->string('pekerjaan');
            $table->string('nama_perusahaan');
            $table->string('biidang_usaha');
            $table->string('jabatan');
            $table->string('alamat_perusahaan');
            $table->string('pendapatan');
            $table->string('sumber_penghasilan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perorangan');
    }
};
