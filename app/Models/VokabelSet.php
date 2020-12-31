<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VokabelSet extends Model
{
  protected $fillable = ["vokabel_id"];
  public static function check(){

    // remove counter bigger then 3 to not get to boring
    $big = VokabelSet::whereRaw("counter > 3");
    if($big->exists()){
      $big->each(function($e){
        $e->delete();
      });
    }

    // keep the set at size 10 to make it easier to remember words
    if(VokabelSet::all()->count() < 10){
      for($i = VokabelSet::all()->count(); $i < 10; $i++){
        VokabelSet::addVokabel();
      }
    }

  }



  public static function addVokabel(){
    $current = VokabelSet::all()->pluck("vokabel_id");

    $vokabel = Vokabel::whereNotIn("id", $current)->oldest("solved")->first();
    VokabelSet::create(["vokabel_id" => $vokabel->getKey()]);
  }

  public function vokabel(){
    return $this->belongsTo(Vokabel::class);
  }
    use HasFactory;
}
