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

  public function stat(int $userID){
    return $this->hasMany(User::class)->where("user_id", $userId);
  }

  public function stats(){
    return $this->hasMany(UserStats::class);
  }
    use HasFactory;
}
