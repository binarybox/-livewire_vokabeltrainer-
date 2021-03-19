<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VokabelSet extends Model
{
    private const MAX_COUNT = 10;

    protected $fillable = ["vokabel_id", "user_id"];
    public static function check()
    {

    // remove counter bigger then 3 to not get to boring
        $big = VokabelSet::where("user_id", Auth::id())
                      ->whereRaw("counter > 3");

        if ($big->exists()) {
            $big->each(function ($e) {
                $e->delete();
            });
        }

        // keep the set at size 10 to make it easier to remember words
        if (VokabelSet::where("user_id", Auth::id())->count() < self::MAX_COUNT) {
            for ($i = VokabelSet::where("user_id", Auth::id())->count(); $i < 10; $i++) {
                VokabelSet::addVokabel();
            }
        }
    }

    public static function addVokabel()
    {
        $userId = Auth::id();

        $current = VokabelSet::where("user_id", $userId)->pluck("vokabel_id");

        $vokabel = Vokabel::whereNotIn("id", $current)->whereNotIn("id", function ($query) {
            $query->select("vokabel_id")->where("user_id", Auth::id())->from("user_stats");
        })->orderBy("id", "desc")->first();

        if (!$vokabel) {
            $vokabel = Vokabel::whereNotIn("vokabels.id", $current)
                        ->join("user_stats", "user_stats.vokabel_id", "=", "vokabels.id")
                        ->where("user_stats.user_id", Auth::id())
                        ->select(
                            array(
                          "vokabels.id as id",
                          "counter"
                          )
                        )
                        ->orderby("counter", "asc")->first();
        }


        VokabelSet::create(["vokabel_id" => $vokabel->id, "user_id" => Auth::id()]);
    }

    public function inc()
    {
        $amount = 1;
        if ($this->counter === 0) {
            $this->counter = self::MAX_COUNT;
            $amount = self::MAX_COUNT;
        } else {
            $this->counter += 1;
        }
        $this->updated_at = \Carbon\Carbon::now();
        $this->save();
        return $amount;
    }

    public function dec()
    {
        $amount = 1;
        if ($this->counter < 1) {
            $this->counter += 1;
        } else {
            $this->counter -= 1;
        }
        $this->updated_at = \Carbon\Carbon::now();
        $this->save();
        return 1;
    }

    public function vokabel()
    {
        return $this->belongsTo(Vokabel::class);
    }
    use HasFactory;
}
