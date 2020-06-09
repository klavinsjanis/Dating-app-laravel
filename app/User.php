<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'user_gender_id', 'target_gender_id',
        'user_age', 'location', 'target_min_age', 'target_max_age', 'about', 'email', 'avatar_location', 'created_at', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $with = ['pictures'];

    public function getPicture(): string
    {
        if ($this->avatar_location === null) {
            return '../storage/profilePictures/images.png';
        } elseif (substr($this->avatar_location, 0, 5) === 'https') {
            return url($this->avatar_location);
        }
        return Storage::url($this->avatar_location);
    }

    public function pictures()
    {
        return $this->hasmany(Picture::class);
    }

    public function affections()
    {
        return $this->hasMany(Affection::class);
    }

    public function matches()
    {
        return $this->hasMany(Matches::class);
    }

    public function likes()
    {
        return $this->hasMany(Affection::class, 'affection_to', 'id')
            ->where('affection_type', 'like');
    }

    public function dislikes()
    {
        return $this->hasMany(Affection::class, 'affection_to', 'id')
            ->where('affection_type', 'dislike');
    }

    public function scopeFilterAffection($query)
    {
        $affections = $this->affections()->pluck('affection_to');
        $query->where('id', '<>', $this->id)->
        whereNotIn('id', $affections->all());
    }


    public function scopeFilterAge($query)
    {
        $minAge = $this->value('target_min_age');
        $maxAge = $this->value('target_max_age');
        $query->whereBetween('user_age', [$minAge, $maxAge]);
    }

    public function scopeFilterGender($query)
    {
        $gender = $this->value('target_gender_id');
        $query->where('id', '<>', $this->id)->
        where('target_gender_id', $gender);
    }

    public function scopeWithoutAuthUser($query)
    {
        $query->where('id', '<>', auth()->id());
    }

    public function scopeFilterMatches($query)
    {
        $matches = $this->matches()
            ->get()
            ->pluck('match_with');

        $matchesReversedUsers = collect($this->matches()
            ->first())
            ->pluck('user_id');

        $matchesAll = $matches->merge($matchesReversedUsers);
        $query->where('id', '<>', $this->id)
            ->whereIn('id', $matchesAll->all());
    }

    public function getMatches()
    {
        $likes = $this->likes()->pluck('user_id');

        return $this->affections()
            ->whereIn('affection_to', $likes)
            ->where('affection_type', 'like')
            ->get();
    }

    public function deleteDislikes()
    {

        $dislikes = $this->dislikes()->pluck('user_id');

        return $this->affections()
            ->whereIn('affection_to', $dislikes)
            ->where('affection_type', 'dislike')
            ->delete();
    }


}
