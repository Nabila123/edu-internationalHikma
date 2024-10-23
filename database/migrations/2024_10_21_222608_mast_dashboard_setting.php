<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mast_dashboard_setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('header')->nullable();
            $table->string('side')->nullable();
            $table->string('video')->nullable();
            $table->unsignedBigInteger('userId');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mast_dashboard_setting');
    }
};
