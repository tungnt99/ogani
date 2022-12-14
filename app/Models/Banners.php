<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'id',
        'title',
        'thumbnail',
        'description',
        'updated_at',
    ];
}
