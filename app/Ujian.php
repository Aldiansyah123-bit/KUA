<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $fillable = ['soal','a','b','c','d','kunci_jawaban'];
}
