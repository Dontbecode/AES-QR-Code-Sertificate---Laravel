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
        Schema::create('data_sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('No_Sertifikat')->references('No_Sertifikat')->on('Datanilai')->onDelete('cascade');
            $table->string('id_sertifikat');
            $table->string('No_peserta');
            $table->string('NIM');
            $table->string('Nama_mhs');
            $table->string('Kode_Enkripsi');
            $table->string('J_Kelamin');
            $table->string('ProgramStudi');
            $table->string('Angkatan');
            $table->double('No_tlpn');
            $table->string('email');
            $table->string('tanggal');
            $table->string('Listening');
            $table->string('Structure');
            $table->string('Reading');
            $table->string('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sertifikats');
    }
};
