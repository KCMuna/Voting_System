<?php

namespace App\Models;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    
    public function Poll() {
        return $this->belongsTo(Poll::class);
    }
}
