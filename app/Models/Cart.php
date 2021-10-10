<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = ['idProduct','email',"quantity","totalPrice"];
    public $incrementing = true;
    public $timestamps = true;
     
     public  function product() {
        return $this->hasOne(products::class,"id","idProduct");
    }
}
