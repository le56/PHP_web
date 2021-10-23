<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
       "admin_id","admin_avatar","admin_email","admin_password","admin_name","admin_phone"
    ];
    protected $table = 'admin';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

}
