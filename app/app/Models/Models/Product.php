<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{    protected $table = 'products';
    protected $fillable = ['pro_name','quantity'];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;
    protected $status =[
        1 =>[
            'name' => 'Public',
            'class' =>'label-success'
        ],
        0 =>[
            'name' => 'Private',
            'class' =>'label-default'
        ]
    ];
    protected $hot =[
        1 =>[
            'name' => 'Nổi bật',
            'class' =>'label-danger'
        ],
        0 =>[
            'name' => 'Không',
            'class' =>'label-default'
        ]
    ];

    public function getStatus(){
        return array_get($this->status, $this->pro_active,'[N\A]');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'pro_category_id');
    }
    public function getHot(){
        return array_get($this->hot, $this->pro_hot,'[N\A]');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'id');
    }
    public function transaction()
    {
        return $this->belongsTo(Order::class, 'id');
    }
}