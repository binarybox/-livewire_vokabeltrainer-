<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vokabel extends Model
{
  public $timestamps = false;
  protected $fillable = ["word"];
  public function answers(){
    return $this->belongsToMany(Vokabel::class, "vokabel_answers", "vokabels_id", "answer_id" );
  }
    use HasFactory;
}
