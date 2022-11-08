<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;
    protected $fillable = [
        
        'id','fullname', 'email', 'note','phone_number',
    ];

}
