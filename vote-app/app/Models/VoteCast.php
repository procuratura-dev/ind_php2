<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteCast extends Model
{
    use HasFactory;

    protected $fillable = ['vote_id', 'option_id', 'user_id'];

    public function vote() {
        return $this->belongsTo(Vote::class);
    }

    public function option() {
        return $this->belongsTo(Option::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
