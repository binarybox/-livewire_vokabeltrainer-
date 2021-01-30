<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vokabel extends Model
{
  public $timestamps = false;
  protected $fillable = ["word"];

  public function answers(){
    return $this->belongsToMany(Vokabel::class, "vokabel_answers", "vokabels_id", "answer_id" );
  }

  public function user_stats(){
    return $this->hasMany("user_stats", "user_stats.vokabel_id", "vokabels.id");
  }

  public function stats(){
    $stats = UserStats::where("vokabel_id", $this->getKey())
                ->where("user_id", Auth::id())->first();
    if($stats){
      return $stats;
    }
    return UserStats::create(["vokabel_id" => $this->getKey(), "user_id" => Auth::id()]);
  }
    use HasFactory;
}
