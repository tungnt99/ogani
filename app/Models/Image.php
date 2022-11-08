<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Image extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'image',
        'product_id',
    ];

    public function products(){
        return $this->belongsTo(Post::class);
    }
}
