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
        Schema::create('pregnancy_checks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id'); // Relasi ke tabel keluarga, khususnya ibu yang menjalani pemeriksaan
            $table->date('check_date'); // Tanggal pemeriksaan, wajib diisi
            $table->string('age_in_checks')->nullable(); // Usia ibu pada saat pemeriksaan, dapat ditulis dalam format: "25 tahun, 10 bulan, 20 hari"
            $table->integer('gestational_age')->nullable(); // Usia kehamilan dalam minggu
            $table->float('mother_weight')->nullable(); // Berat badan ibu dalam satuan kilogram (kg)
            $table->string('blood_pressure')->nullable(); // Tekanan darah ibu, contoh format: "120/80"
            $table->integer('pulse_rate')->nullable(); // Denyut nadi (bpm)
            $table->float('blood_sugar')->nullable(); // Gula darah sewaktu (mg/dL)
            $table->float('cholesterol')->nullable(); // Kadar kolesterol (mg/dL)
            $table->string('fundus_height')->nullable(); // Tinggi fundus rahim dalam satuan sentimeter (cm)
            $table->string('fetal_heart_rate')->nullable(); // Detak jantung janin dalam satuan denyut per menit (bpm)
            $table->enum('fetal_presentation', ['Kepala', 'Bokong', 'Lainnya']); // Presentasi janin, misalnya: Kepala, Bokong, atau lainnya
            $table->enum('edema', ['Tidak', 'Ringan', 'Sedang', 'Berat']); // Tingkat edema pada ibu, dengan pilihan yang lebih valid: Tidak, Ringan, Sedang, atau Berat
            $table->text('notes')->nullable(); // Catatan tambahan mengenai pemeriksaan jika ada
            $table->unsignedBigInteger('officer_id')->nullable(); // ID petugas medis yang melakukan pemeriksaan
            $table->timestamps(); // Waktu pembuatan dan pembaruan data

            // Menambahkan relasi ke tabel 'family_parents' untuk kolom 'parent_id', dan jika data dihapus maka data ini juga ikut dihapus
            $table->foreign('parent_id')->references('id')->on('family_parents')->onDelete('cascade');
            // Menambahkan relasi ke tabel 'officers' untuk kolom 'officer_id', dan jika petugas dihapus, maka kolom ini di-set null
            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnancy_checks');
    }
};
