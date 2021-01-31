<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Numbers extends Model
{
  protected $fillable = ["number", "user_id", "counter"];

  public static function inc($number){
    $n = Numbers::where([["number", "=", $number], ["user_id", "=", Auth::id()]]);
    if($n->exists()){
      $num = $n->first();
      $num->counter += 1;
      $num->updated_at = \Carbon\Carbon::now();
      $num->save();
    }
    else{
      $num = Numbers::create(["number" => $number, "user_id" => Auth::id(), "counter" => 1]);
    }
  }

  public static function dec($number){
    $n = Numbers::where([["number", "=", $number], ["user_id", "=", Auth::id()]]);
    if($n->exists()){
      $num = $n->first();
      if($num->counter > 0){
        $num->counter -= 1;
      }
      $num->updated_at = \Carbon\Carbon::now();
      $num->save();
    }
    else{
      $num = Numbers::create(["number" => $number, "user_id" => Auth::id()]);
    }
  }
    use HasFactory;
}
