<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightTable extends Migration
{
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id(); // Auto-increment
            $table->string('numero_voo');
            $table->string('companhia_aerea');
            $table->string('tipo_voo'); // Regular ou Charter
            $table->string('tipo_aeronave'); // PC, MC, ou LC
            $table->integer('quantidade_voos');
            $table->string('horario_voo'); // EAM, AM, AN ou PM
            $table->string('nota_objetivos');
            $table->string('nota_pontualidade');
            $table->string('nota_servicos');
            $table->string('nota_patios');
            $table->string('nota_relacionamento');
            $table->integer('quantidade_passageiros');
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
