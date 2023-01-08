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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id('cod_emp');
            $table->unsignedBigInteger('cod_aluno');
            $table->foreign('cod_aluno')->references('cod_aluno')->on('alunos');
            $table->unsignedBigInteger('num_reg');
            $table->foreign('num_reg')->references('num_reg')->on('livros');
            $table->date('data_emp');
            $table->date('data_retorno');
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
};
