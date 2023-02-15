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
        Schema::create('caixas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo')->default('0');
            $table->string('codcaixa')->default('0');
            $table->string('codoperador')->default('0');
            $table->timestamp('data')->useCurrent();
            $table->double('saida')->default(0);
            $table->double('entrada')->default(0.0);
            $table->string('codconta')->default('0');
            $table->string('historico')->default('SEM HISTORICO');
            $table->string('movimento')->default('0');
            $table->double('valor')->default('0');
            $table->string('codnfsaida')->default('0');
            $table->double('posto')->default(0.0);
            $table->string('codigo_venda')->default('0');
            $table->timestamp('hora')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caixas');
    }
};
