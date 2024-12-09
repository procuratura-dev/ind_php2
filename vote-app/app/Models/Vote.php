<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function options() {
        return $this->hasMany(Option::class);
    }

    public function casts() {
        return $this->hasMany(VoteCast::class);
    }
}
