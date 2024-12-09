<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['vote_id', 'title'];

    public function vote() {
        return $this->belongsTo(Vote::class);
    }

    public function casts() {
        return $this->hasMany(VoteCast::class);
    }
}
