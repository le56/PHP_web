<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','rate','price','image0','image1','image2','image3','category','description',"selled"];
    public $incrementing = true;
    public $timestamps = true;  
}
