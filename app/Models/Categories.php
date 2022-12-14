<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasPermissions;
use App\Models\Products;
class Categories extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
