<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = 'posts';
    // protected $primaryKey = 'id';
    // protected $timestamps = false;
    // protected $dataTime = 'U';
    // protected $connection = 'sqlite';

    protected $attributes = [
        'is_published' => true
    ];
}
