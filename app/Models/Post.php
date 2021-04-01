<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function imagePost()
    {
        return $this->hasMany('App\Image');
    }

    protected $fillable = [
        'datePost'
    ];

}
