<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_slider extends Model
{
    use HasFactory;
    protected $table = 'slider_home';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','image','image_thumb'];
    public $incrementing = true;
    public $timestamps = true;
}
