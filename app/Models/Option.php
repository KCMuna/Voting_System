<?php

namespace App\Models;

use App\Models\Poll;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    use Timestamp;
    
    public function Poll() {
        return $this->belongsTo(Poll::class);
    }
}
