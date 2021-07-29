<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStats extends Model
{
    protected $fillable = ["vokabel_id", "user_id"];
    use HasFactory;

    public function vocabel()
    {
        return $this->belongsTo(Vokabel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inc($amount)
    {
        $this->counter += $amount;
        $this->updated_at = \Carbon\Carbon::now();
        $this->save();
        return $this->counter;
    }

    public function dec($amount)
    {
        if ($this->counter >= $amount) {
            $this->counter -= $amount;
        }
        $this->updated_at = \Carbon\Carbon::now();
        $this->save();
        return $this->counter;
    }
}
