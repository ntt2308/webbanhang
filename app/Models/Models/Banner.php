<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{   
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const SALE_ON = 1;
    const SALE_OFF = 0;
    protected $table = 'banner';
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
    protected $sale =[
        1 =>[
            'name' => 'Bật',
            'class' =>'label-danger'
        ],
        0 =>[
            'name' => 'Tắt',
            'class' =>'label-default'
        ]
    ];

    public function getStatus(){
        return array_get($this->status, $this->b_active,'[N\A]');
    }
    public function getSale(){
        return array_get($this->sale, $this->b_sale,'[N\A]');
    }
}
