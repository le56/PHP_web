<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshots extends Model
{
    use HasFactory;
    protected $table = 'screenshot';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','image','image_thumb'];
    public $incrementing = true;
    public $timestamps = true;
}
