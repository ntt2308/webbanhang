<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
   protected $guarded = ['*'];
   protected $fillable = [
   'ra_product_id', 'ra_user_id', 'ra_number', 'ra_content', 
];
   public function user(){
    return $this->belongsTo(User::class, 'ra_user_id');
}
    public function product(){
        return $this->belongsTo(Product::class,'ra_product_id','id');
    }
}
