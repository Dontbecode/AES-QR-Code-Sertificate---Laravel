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
        Schema::create('datamahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('No_peserta')->unique();
            $table->string('NIM');
            $table->string('Nama_mhs');
            $table->string('J_Kelamin');
            $table->string('ProgramStudi');
            $table->string('Angkatan');
            $table->double('No_tlpn');
            $table->string('email')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datamahasiswas');
    }
};
