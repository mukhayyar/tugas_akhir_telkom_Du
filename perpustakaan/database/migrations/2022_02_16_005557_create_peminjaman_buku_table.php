<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_buku', function (Blueprint $table) {
            $table->id();
            $table->index('member_id');
            $table->foreignId('member_id')->constrained('member')->cascadeOnDelete()->cascadeOnUpdate();
            $table->index('buku_id');
            $table->foreignId('buku_id')->constrained('buku')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('denda')->nullable();
            $table->string('tgl_pinjam')->nullable();
            $table->string('tgl_kembali')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_buku');
    }
}
