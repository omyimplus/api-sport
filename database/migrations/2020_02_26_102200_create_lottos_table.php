<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLottosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lotto1')->nullable();
            $table->text('lotto2')->nullable();
            $table->text('lotto3')->nullable();
            $table->longtext('lotto4')->nullable();
            $table->longtext('lotto5')->nullable();
            $table->string('lotto1closeup')->nullable();
            $table->string('lotto_last2')->nullable();
            $table->string('lotto_last3')->nullable();
            $table->string('lotto_front3')->nullable();
            $table->string('lotto_at');
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
        Schema::dropIfExists('lottos');
    }
}
