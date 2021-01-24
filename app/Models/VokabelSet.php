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

    $vokabels = Vokabel::whereNotIn("id", $current);

    $vokabel;
    if($vokabels->has("stats")->exists()){

      $vokabel = $vokabels->has("stats")->first();
    }
    else{
      $vokabel = $vokabels->oldest("vokabels.created_at")->first();
    }
    VokabelSet::create(["vokabel_id" => $vokabel->getKey(), "user_id" => Auth::id()]);
  }

  public function vokabel(){
    return $this->belongsTo(Vokabel::class);
  }
    use HasFactory;
}
