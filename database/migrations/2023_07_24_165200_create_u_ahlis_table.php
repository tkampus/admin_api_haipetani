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
        Schema::create('u_ahlis', function (Blueprint $table) {
            $table->id();
            $table->string('nohp')->unique();
            // $table->binary('gambar')->nullable();
            $table->string('gambar')->nullable();
            $table->string('email')->nullable();
            $table->string('nik')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('alamat')->nullable();
            // ahli
            $table->string('nip')->nullable();
            $table->float('bintang', 2, 1)->nullable();
            $table->string('keahlian1')->nullable();
            $table->string('keahlian2')->nullable();
            $table->string('kantor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_ahlis');
    }
};
