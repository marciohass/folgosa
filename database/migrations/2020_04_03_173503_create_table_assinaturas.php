<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAssinaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assinaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->longText('descricao',255)->nullable();
            $table->decimal('valor',8,2)->nullable();
            $table->string('imagem',255)->nullable();
            $table->bigInteger('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos');
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
        Schema::dropIfExists('assinaturas');

    }
}
