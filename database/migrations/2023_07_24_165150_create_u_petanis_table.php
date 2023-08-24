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
        Schema::create('u_petanis', function (Blueprint $table) {
            $table->id();
            $table->string('nohp')->unique();
            // $table->binary('gambar')->nullable();
            $table->string('gambar')->nullable();
            $table->string('email')->nullable();
            $table->string('nik')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_petanis');
    }
};
