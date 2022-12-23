<?php

namespace App\Models;

use App\Models\Vote;
use App\Models\Option;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function Submitted_Vote() {

    //     return $this->belongsTo(Submitted_Vote::class);
    // }
    public function Option() {

        return $this->belongsTo(Option::class);
    }
    public function votedPolls(){
        return $this->belongsToMany(Poll::class, 'submitted__votes', 'user_id', 'poll_id')->withPivot('option_id');
    }
}





