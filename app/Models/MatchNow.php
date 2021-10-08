<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchNow extends Model
{
    use HasFactory;
    protected $table = 'match';
    protected $primaryKey = 'id';
    protected $fillable = ['team1', 'team2', 'logoTeam1', 'logoTeam2'];
    public $incrementing = true;
    public $timestamps = true;
}
