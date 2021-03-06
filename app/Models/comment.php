<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table ='comments';
    protected $primaryKey = 'id';
    protected $fillable = ['rewiew','title','user_name','rate','idProduct','avatar'];
    public $incrementing = true;
    public $timestamps = true;
}
