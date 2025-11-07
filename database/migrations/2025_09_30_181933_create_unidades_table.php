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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //Adicionar o relactionamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->bigInteger('unidade_id');

            //Criando a fk
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //Adicionar o relactionamento com a tabela produto_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            $table->bigInteger('unidade_id');

            //Criando a fk
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Remover o relactionamento com produtos_detalhes
        Schema::table('produtos_detalhes', function(Blueprint $table){
            //Remover a FK
            $table->dropForeign('produtos_detalhes_unidade_id_foreign'); //[table_coluna_foreign]
            //Remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        //Remover o relactionamento com produtos
        Schema::table('produtos', function(Blueprint $table){
            //Remover a FK
            $table->dropForeign('produtos_unidade_id_foreign'); //[table_coluna_foreign]
            //Remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        //Remove a tabela
        Schema::dropIfExists('unidades');
    }
};
