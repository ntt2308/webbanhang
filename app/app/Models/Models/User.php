<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $guafded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
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
    // public function getStatus(){
    //     return array_get($this->status, $this->c_active,'[N\A]');
    // }
}
