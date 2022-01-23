<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aos', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->foreignId('user_id');
            $table->string('scenario');
            $table->string('pointlimit')->nullable();
            //player 1
            $table->string('player1_name');
            $table->string('player1_faction');
            $table->string('player1_grandstrat');
            $table->string('player1_score');
            //player 2
            $table->string('player2_name');
            $table->string('player2_faction');
            $table->string('player2_grandstrat');
            $table->string('player2_score');

            $table->boolean('victory_p1');
            $table->boolean('victory_p2');

            $table->text('aosdescription')->nullable();
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
        Schema::dropIfExists('aos');
    }
}
