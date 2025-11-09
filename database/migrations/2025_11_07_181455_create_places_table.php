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
        Schema::create('places', function (Blueprint $table) {
            $table->id(); //primary key
            $table->integer('hall_id'); //foreign key
            $table->integer('row'); //номер ряда
            $table->integer('place'); //номер места в ряду
            $table->string('status')->default('<span class="conf-step__chair conf-step__chair_disabled">'); //<html>
            $table->decimal('price')->default(0); //цена места
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
