<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fixture extends Model
{
    use HasFactory;
    protected $fillable = [
        'home_team' , 'away_team' , 'status' , 'date'
    ];
}
