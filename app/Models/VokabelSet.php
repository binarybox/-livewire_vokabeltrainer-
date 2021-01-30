<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VokabelSet extends Model
{
  protected $fillable = ["vokabel_id", "user_id"];
  public static function check(){

    // remove counter bigger then 3 to not get to boring
    $big = VokabelSet::where("user_id", Auth::id())
                      ->whereRaw("counter > 3");

    if($big->exists()){
      $big->each(function($e){
        $e->delete();
      });
    }

    // keep the set at size 10 to make it easier to remember words
    if(VokabelSet::where("user_id", Auth::id())->count() < 10){
      for($i = VokabelSet::where("user_id", Auth::id())->count(); $i < 10; $i++){
        VokabelSet::addVokabel();
      }
    }
  }

  public static function addVokabel(){
    $userId = Auth::id();

    $current = VokabelSet::where("user_id", $userId)->pluck("vokabel_id");

    $vokabel = Vokabel::whereNotIn("id", $current)->whereNotIn("id", function($query){
      $query->select("vokabel_id")->where("user_id", Auth::id())->from("user_stats");
    })->orderBy("id", "desc")->first();

    if(!$vokabel){
      $vokabel = Vokabel::whereNotIn("vokabels.id", $current)
                        ->join("user_stats", "user_stats.vokabel_id", "=", "vokabels.id")
                        ->where("user_stats.user_id", Auth::id())
                        ->select(array(
                          "vokabels.id as id",
                          "counter"
                          )
                        )
                        ->orderby("counter", "asc")->first();

    }


    VokabelSet::create(["vokabel_id" => $vokabel->id, "user_id" => Auth::id()]);
  }

  public function vokabel(){
    return $this->belongsTo(Vokabel::class);
  }
    use HasFactory;
}
