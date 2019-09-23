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
            $table->unsignedBigInteger('id')->index();
            $table->integer('cnpj');
            $table->string('razao')->unique();
            $table->string('servico');
            $table->timestampTz();

        $table->foreign("id")
            ->references("id")
            ->on('pessoas')
            ->onUpdate("cascade")
            ->onDelete("cascade");

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
