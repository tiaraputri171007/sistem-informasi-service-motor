
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_services', function (Blueprint $table) {
            $table->id();

            $table->foreignId('daftar_service_id')
                ->unique()
                ->constrained('daftar_services')
                ->cascadeOnDelete();

            $table->text('keluhan_kendaraan');
            $table->string('estimasi_service');
            $table->string('nama_mekanik');
            $table->text('sparepart_pengganti')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_services');
    }
};
