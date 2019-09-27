<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewKatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_katos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code',9);
            $table->string('ab',2);
            $table->string('cd',2);
            $table->string('ef',2);
            $table->string('hij',3);
            $table->string('k',1);
            $table->string('kk',50);
            $table->string('ru',50);
            $table->string('nn',4)->nullable(true);
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
        Schema::dropIfExists('new_katos');
    }
}
