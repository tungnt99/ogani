<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use HasFactory;
    use TransformableTrait;
    
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'address',
       ' total_price',
        'note'
    ];

    public function orderitems() {
        return $this->hasMany(OrderItem::class);
    }
}
