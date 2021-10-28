<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ["id","email","idProduct","quantity","totalPrice","status"];
    public $incrementing = true;
    public $timestamps = true;

    public function product() {
        return $this->hasOne(products::class,"id","idProduct");
    }
}
