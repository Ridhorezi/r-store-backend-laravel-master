<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'slug',
        'quantity'
    ];

    protected $hidden = [
      
    ];

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id');
    }

}
