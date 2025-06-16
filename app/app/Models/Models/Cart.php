<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','user_id', 'pro_id','name','image','price', 'quantity'];
   public function product(){
    return $this->belongsTo(Product::class, 'pro_id', 'id');
   }
   public function user(){
    return $this->belongsTo(User::class, 'id');
   }
}