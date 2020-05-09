<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function($table) {
            $table->string('nome',255)->change();
            $table->string('telefone',15)->change();
            $table->string('cep',9)->change();
            $table->string('numero',6)->change();
            $table->string('complemento',20)->change();
            $table->string('bairro',50)->change();
            $table->string('cidade',50)->change();
            $table->string('uf',2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
