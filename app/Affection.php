<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affection extends Model
{
    protected $fillable = ['affection_to', 'affection_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
