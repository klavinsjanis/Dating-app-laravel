<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['order'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
