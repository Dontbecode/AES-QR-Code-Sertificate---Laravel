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
        Schema::create('datanilais', function (Blueprint $table) {
            $table->id();
            $table->string('No_peserta')->references('No_peserta')->on('datamahasiswa')->onDelete('cascade');
            $table->string('NIM');
            $table->string('Nama_mhs');
            $table->string('J_Kelamin');
            $table->string('ProgramStudi');
            $table->string('Angkatan');
            $table->double('No_tlpn');
            $table->string('email');
            $table->string('tanggal')->nullable();
            $table->string('Listening')->nullable();
            $table->string('Structure')->nullable();
            $table->string('Reading')->nullable();
            $table->string('Total')->nullable();
            $table->string('No_Sertifikat')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datanilais');
    }
};
