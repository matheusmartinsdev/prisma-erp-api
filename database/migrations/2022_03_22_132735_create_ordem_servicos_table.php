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
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contratante_id')->constrained('contratantes');
            $table->enum(
                'natureza',
                [
                    'outros',
                    'mecanica',
                    'hidraulica',
                    'civil',
                    'checklist',
                    'medicao',
                    'acompanhamento',
                    'eletrico',
                    'administrativo'
                ]
            );
            $table->enum('tipagem', ['corretiva', 'preventiva']);
            $table->time('inicio');
            $table->timestamp('finalizacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servicos');
    }
};
