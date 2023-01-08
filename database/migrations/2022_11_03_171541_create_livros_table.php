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
        Schema::create('livros', function (Blueprint $table) {
            $table->id('num_reg');
            $table->date('data_reg');
            $table->string('titulo',100);
            $table->year('publi');
            $table->string('aquis');
            $table->integer('ex')->nullable()->default(null);
            $table->integer('vol')->nullable()->default(null);
            $table->unsignedBigInteger('cod_author');
            $table->foreign('cod_author')->references('cod_author')->on('authors');
            $table->string('cod_cdd',11);
            $table->foreign('cod_cdd')->references('cod_cdd')->on('cdds');
            $table->unsignedBigInteger('cod_edi');
            $table->foreign('cod_edi')->references('cod_edi')->on('editoras');
            $table->string('local',90);
            $table->boolean('disponivel')->default(1);
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
        Schema::dropIfExists('livros');
    }
};
