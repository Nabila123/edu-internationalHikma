<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mast_video', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('judul');
            $table->text('video');
            $table->unsignedBigInteger('userId');
            $table->char('isActive');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mast_video');
    }
};
