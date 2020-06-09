<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $fillable = [
        'user_id', 'match_with'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
