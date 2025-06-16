<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'oders';
    protected $guarded = ['*'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'od_transaction_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'od_product_id', 'id');
    }
}
