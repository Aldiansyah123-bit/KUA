<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $fillable = ['id_user', 'kehadiran'];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
