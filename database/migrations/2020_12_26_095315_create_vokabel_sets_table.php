<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVokabelSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vokabel_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade");
            $table->timestamps();
            $table->unsignedBigInteger("vokabel_id");
            $table->foreign("vokabel_id")
                  ->references("id")
                  ->on("vokabels")
                  ->onDelete("cascade");
            $table->unsignedInteger("counter")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vokabel_sets');
    }
}
