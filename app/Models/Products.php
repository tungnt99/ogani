<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Models\Image;
use App\Models\Categories;

/**
 * Class Product.
 *
 * @package namespace App\Models;
 */
class Products extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $fillable = [
        'id',
        'title',
        'cover',
        'price',
        'discount',
        'description',
        'category_id'
    ];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function category() {
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    public function scopeSearch($query){
        if(request('key')){
            $key = request('key');
            $query = $query->where('title', 'like', '%'.$key.'%');
        }

        return $query;
    }
}
