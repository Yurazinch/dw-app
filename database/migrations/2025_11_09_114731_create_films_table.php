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
        Schema::create('films', function (Blueprint $table) {
            $table->id();            
            $table->string('name')->default(''); //название
            $table->string('description')->default(''); //описание
            $table->string('country')->default(''); //страна
            $table->integer('duration')->defaul(0); //длительность (мин.)
            $table->string('poster'); //ссылка на постер
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
