<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $fillable = ['title','idUser', 'content', 'shortContent', 'image', 'category','admin','display','approved'];
    public $incrementing = true;
    public $timestamps = true;

    public function user() {
        return $this->hasOne(User::class,'id','idUser');
    }
    public function Admin() {
        return $this->hasOne(Admin::class,'admin_id','idUser');
    }

    public function getCate() {
        return $this->hasOne(Category::class,'id','category');
    }
}
