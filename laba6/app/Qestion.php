<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Qestion extends Model
{
    protected $table='qestion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'vopros', 'index_right','id_test'
    ];
    protected $casts = [
        'index_right' => 'array',
        'vopros' => 'array'
      ];
    
}
