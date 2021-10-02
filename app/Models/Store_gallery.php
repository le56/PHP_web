<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store_gallery extends Model
{
    use HasFactory;
    protected $table = 'store_gallerys';
    protected $primaryKey = 'id';
    protected $fillable = ['image',"title"];
    public $incrementing = true;
    public $timestamps = true;
}
