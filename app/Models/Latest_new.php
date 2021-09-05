<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latest_new extends Model
{
    use HasFactory;
    protected $table = 'latest_new';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','image','image_sm','category'];
    public $incrementing = true;
    public $timestamps = true;
}
