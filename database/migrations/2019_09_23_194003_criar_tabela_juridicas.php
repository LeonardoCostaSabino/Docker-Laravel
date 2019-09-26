<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaJuridicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juridicas', function (Blueprint $table){
            $table->unsignedBigInteger('pessoas_id')->unique();
            $table->integer('cnpj');
            $table->string('razao')->unique();
            $table->string('servico');
            $table->string('objetivo');
            $table->string('inscricaoestadual');
            $table->string('inscricaomunicipal');
            $table->boolean('microempresa');
            $table->string('tipo');
            $table->timestampsTz();

        $table->foreign("pessoas_id")
            ->references("id")
            ->on('pessoas')
            ->onUpdate("cascade")
            ->onDelete("cascade");

            Schema::enableForeignKeyConstraints();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('juridicas');
    }
}
