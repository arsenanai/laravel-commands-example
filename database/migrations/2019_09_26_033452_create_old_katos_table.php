<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldKatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_katos', function (Blueprint $table) {
            $table->bigInteger('id')->unique();
            $table->string('code',9);
            $table->string('kk',50);
            $table->string('ru',50);
            $table->string('full_kk',255);
            $table->string('full_ru',255);
            $table->boolean('has_child');
            $table->bigInteger('parent_id')->nullable(true);
            $table->boolean('deleted');
            $table->boolean('updated');
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
        Schema::dropIfExists('old_katos');
    }
}
