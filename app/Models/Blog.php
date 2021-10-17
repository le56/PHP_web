<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $fillable = ['title','idUser', 'content', 'shortContent', 'image', 'category'];
    public $incrementing = true;
    public $timestamps = true;

    public function user() {
        return $this->hasOne(User::class,'id','idUser');
    }
}
