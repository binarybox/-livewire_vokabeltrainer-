<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                  ->references("id")
                  ->on("users")
                  ->onDelete("cascade");
            $table->unsignedBigInteger("vokabel_id");
            $table->foreign("vokabel_id")
                  ->references("id")
                  ->on("vokabels")
                  ->onDelete("cascade");
            $table->unsignedInteger("counter")->default(0);
        });

        // get all old entries and put it in the user stats table
        if (Schema::hasColumn("vokabels", "counter")) {
            $user = \App\Models\User::all()->first();
            if ($user) {
                \App\Models\Vokabel::all()->each(function ($elem) use ($user) {
                    $stat = \App\Models\UserStats::create(["user_id" => $user->id, "vokabel_id" => $elem->id]);
                    $stat->counter = $elem->counter;
                    $stat->updated_at = $elem->solved;
                    $stat->save();
                });
            }

            Schema::table("vokabels", function ($table) {
                $table->dropColumn("counter");
                $table->dropColumn("solved");
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_stats');
    }
}
