<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinfo', function (Blueprint $table) {
            $table->id();
            $table->string('catname');
            $table->string('fondo');
            $table->string('imgstory');
            $table->text('history');
            $table->string('carrousel1');
            $table->text('carrousel1text');
            $table->string('carrousel2');
            $table->text('carrousel2text');
            $table->string('carrousel3');
            $table->text('carrousel3text');
            $table->string('select1');
            $table->string('select2');
            $table->string('select3');
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
        Schema::dropIfExists('webinfo');
    }
}
