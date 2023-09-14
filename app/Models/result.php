<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;

    protected $fillable = [
       'match_id' , 'home_goal' , 'away_goal' , 'date'
    ];
}
