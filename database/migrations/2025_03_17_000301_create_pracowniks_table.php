<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pracowniks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('firma_id')->constrained()->cascadeOnDelete();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('email');
            $table->string('numer_telefonu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pracowniks');
    }
};
