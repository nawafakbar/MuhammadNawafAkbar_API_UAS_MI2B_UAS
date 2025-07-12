<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UasMobile extends Model
{

    protected $table = 'uas_mobile';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama', 'alamat', 'no_telepon', 'tipe', 'lat', 'lng'
    ];

}