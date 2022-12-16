<?php

namespace App\Models;

use App\Models\User;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submitted_Vote extends Model
{
    use HasFactory;
    public function User() {

    return $this->belongsTo(User::class);
}
public function Option() {

    return $this->hasMany(Option::class);
}


}
