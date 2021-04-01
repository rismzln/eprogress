<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function device()
    {
        return $this->belongTo('App\Post', 'id');
    }

    public $timestamps = false;


}
