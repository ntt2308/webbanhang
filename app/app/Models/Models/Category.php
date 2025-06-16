<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guafded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOME = 1;
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
    protected $home =[
        1 =>[
            'name' => 'Public',
            'class' =>'label-primary'
        ],
        0 =>[
            'name' => 'Private',
            'class' =>'label-default'
        ]
    ];
    public function getStatus(){
        return array_get($this->status, $this->c_active,'[N\A]');
    }
    public function getHome(){
        return array_get($this->home, $this->c_home,'[N\A]');
    }
    public function Products(){
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
