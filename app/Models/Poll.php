<?php

namespace App\Models;
use Carbon\Traits\Timestamp;
use App\Models\Option;
use App\Models\Submitted_Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poll extends Model
{
    use HasFactory;
    use Timestamp;
    public function Option() {

        return $this->hasMany(Option::class);
    }
    public function Submitted_Vote() {
        return $this->hasMany(Submitted_Vote::class);
    }
}
