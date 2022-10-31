<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class Blogs extends Model implements HasMedia
{
    use HasFactory;  use HasMediaTrait;
    use LogsActivity, InteractsWithMedia;
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'updated_at',
    ];
}
