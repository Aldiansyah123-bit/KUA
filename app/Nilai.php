<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable =['id_user','nilai'];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }
}
