<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTableModelos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modelos', function (Blueprint $table) {
            $table->string('email',255)->nullable()->after('descricao');
            $table->string('telefone',14)->nullable()->after('descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modelos', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('telefone');
        });
    }
}
