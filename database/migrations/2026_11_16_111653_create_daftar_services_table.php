
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_services', function (Blueprint $table) {
            $table->id();
            $table->string('kode_service')->unique();

            $table->foreignId('kendaraan_id')
                ->constrained('kendaraans')
                ->cascadeOnDelete();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->cascadeOnDelete();

            $table->text('keluhan_kendaraan');
            $table->date('tanggal_service');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_services');
    }
};
