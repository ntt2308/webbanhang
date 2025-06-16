<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProImage extends Model
{
    protected $table = 'product_image';
    protected $fillable = ['product_id','img_product'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}