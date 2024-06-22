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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('no_telepon')->unique();
            $table->string('email')->unique();
            $table->enum('status_pernikahan', ['Sudah Menikah', 'Belum Menikah']);
            $table->enum('jabatan', [
                'Kepala Dinas', 'Sekretaris', 'Kabid IKP', 'Kabid TIP', 'Kabid Statistik',
                'Anggota IKP', 'Anggota TIP', 'Anggota Statistik'
            ]);
            $table->enum('status_kepegawaian', ['PNS', 'Kontrak']);
            $table->string('nip')->unique();
            $table->enum('pendidikan_terakhir', [
                'SD/MI Sederajat', 'SMP/MTS Sederajat', 'SMA/SMK/MA Sederajat',
                'Sarjana', 'Lainnya'
            ]);
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
