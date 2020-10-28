<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('scenario');
            //player 1
            $table->string('player1_name');
            $table->string('player1_army');
            $table->string('player1_primary');
            $table->string('player1_secondary');
            $table->string('player1_score');
            //player 2
            $table->string('player2_name');
            $table->string('player2_army');
            $table->string('player2_primary');
            $table->string('player2_secondary');
            $table->string('player2_score');
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
        Schema::dropIfExists('games');
    }
}
