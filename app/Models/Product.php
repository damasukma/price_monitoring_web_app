<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'product_name',
        'url',
        'images',
        'product_description',
        'price',
    ];

    public function histories()
    {
        return $this->hasMany(HistoryPrice::class);
    }
   
}
