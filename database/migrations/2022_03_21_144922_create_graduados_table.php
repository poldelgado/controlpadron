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
        Schema::create('graduados', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_nombre');
            $table->integer('dni')->unique();
            $table->boolean('llamado')->default(false);
            $table->foreignId('lista_id');
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
        Schema::dropIfExists('graduados');
    }
};
