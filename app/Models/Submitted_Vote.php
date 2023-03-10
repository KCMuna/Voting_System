<?php

namespace App\Models;

use App\Models\Poll;
use App\Models\User;
use App\Models\Option;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submitted_Vote extends Model
{
    use HasFactory;
    use Timestamp;
    public function Polls() {
        return $this->belongsToMany(Poll::class);
    }
    public function Option() {
        return $this->belongsTo(Option::class);
    }
    public function User() {
        return $this->belongsTo(User::class);
    }
}




