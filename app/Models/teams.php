<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teams extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $fillable = ["id","teamName","banner","phayerID1","phayerID2","phayerID3","phayerID4","phayerID5"];
    public $incrementing = true;
    public $timestamps = true;
}
