<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = []; 

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
