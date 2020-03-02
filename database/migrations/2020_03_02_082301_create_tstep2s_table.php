<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTstep2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tstep2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid');
            $table->string('team1');
            $table->string('team2');
            $table->integer('team1w')->default(0);
            $table->integer('team2w')->default(0);
            $table->timestamps();
        });
        for ($i=1; $i < 9; $i++) { 
            // \App\Tstep2::insert([
            //     'uid' => ceil($i+1),
            //     'team1' => 'AZ อัลค์ม่าร์ 2 รอง 0.25',
            //     'team2' => 'พีเอสวี ไอนด์โฮเฟ่น รอง 0.25',
            //     'team1w' => 0,
            //     'team2w' => 1,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tstep2s');
    }
}
