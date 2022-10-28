<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class Blogs extends Model implements HasMedia
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
    ];
}
