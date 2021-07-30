<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPrice extends Model
{
    use HasFactory;

    protected $table = 'history_price';

    protected $fillable = [
        'product_id',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
   
}
