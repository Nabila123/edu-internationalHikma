<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mast_logos', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('logo')->nullable();
            $table->enum('kategori', ['utama', 'header', 'component']);
            $table->unsignedBigInteger('userId')->nullable();
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mast_logos');
    }
};
