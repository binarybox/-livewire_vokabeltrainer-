<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vokabel extends Model
{
    private const MAX_COUNT = 3;
    private const SET_SIZE = 10;
    public $timestamps = false;
    protected $fillable = ["word"];

    public function answers()
    {
        return $this->belongsToMany(Vokabel::class, "vokabel_answers", "vokabels_id", "answer_id");
    }

    public function user_stats()
    {
        return $this->hasMany("user_stats", "user_stats.vokabel_id", "vokabels.id");
    }

    public function stats()
    {
        $stats = UserStats::where("vokabel_id", $this->getKey())
                ->where("user_id", Auth::id())->first();
        if ($stats) {
            return $stats;
        }
        return UserStats::create(["vokabel_id" => $this->getKey(), "user_id" => Auth::id()]);
    }

    public function inc()
    {
        $amount = 1;
        $stats = VokabelSet::where([
          ["user_id", "=", \Auth::id()],
          ["vokabel_id", "=", $this->getKey()]
        ])->first();
        $user_stats = $this->stats();
        if ($stats->counter === 0) {
            VokabelSet::where([
              ["user_id", "=", \Auth::id()],
              ["vokabel_id", "=", $this->getKey()]
            ])->update(["counter" => self::MAX_COUNT + 1]);

            $user_stats->counter += self::MAX_COUNT + 1;
        } else {
            VokabelSet::where([
              ["user_id", "=", \Auth::id()],
              ["vokabel_id", "=", $this->getKey()]
            ])->update(["counter" => $stats->counter + 1]);
            $user_stats->counter += 1;
        }

        $user_stats->updated_at = \Carbon\Carbon::now();
        $user_stats->save();
        return $amount;
    }

    public function dec()
    {
        $user_stats = $this->stats();
        $stats = VokabelSet::where([
          ["user_id", "=", \Auth::id()],
          ["vokabel_id", "=", $this->getKey()]
        ])->first();
        if ($stats->counter > 1) {
            $amount = $stats->counter - 1;
            if ($user_stats->counter > 0) {
                $user_stats->counter -= 1;
            }
        } else {
            $amount = 1;
            if ($user_stats->counter > 0) {
                $user_stats->counter -= 1;
            }
        }
        $user_stats->updated_at = \Carbon\Carbon::now();
        $user_stats->save();

        VokabelSet::where([
          ["user_id", "=", \Auth::id()],
          ["vokabel_id", "=", $this->getKey()]
        ])->update(["counter" => $amount]);
        return 1;
    }
    use HasFactory;
}
