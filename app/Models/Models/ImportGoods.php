<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportGoods extends Model
{
    protected $table = 'import_goods';

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}
