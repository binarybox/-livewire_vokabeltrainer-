<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VokabelAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("vokabel_answers", function(Blueprint $table){
          $table->unsignedBigInteger("vokabels_id");
          $table->foreign("vokabels_id")
                ->references("id")
                ->on("vokabels")
                ->onDelete("cascade");

          $table->unsignedBigInteger("answer_id");
          $table->foreign("answer_id")
                ->references("id")
                ->on("vokabels")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("vokabel_answers");
    }
}
