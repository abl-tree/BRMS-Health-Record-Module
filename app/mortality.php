<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mortality extends Model
{
     protected $table = "mortality";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'DOD', 'COD'
    ];
}
