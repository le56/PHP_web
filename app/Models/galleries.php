<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galleries extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','image','image_thumb'];
    public $incrementing = true;
    public $timestamps = true;
}
