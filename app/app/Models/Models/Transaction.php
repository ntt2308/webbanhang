<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['*'];

    const STATUS_DEFAULT = 0;
    const STATUS_DONE = 1;
    const STATUS_WAIT = 2;
    const STATUS_FAILUE = 3;
    public function user(){
        return $this->belongsTo(User::class, 'tr_user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'id');
    }
}
