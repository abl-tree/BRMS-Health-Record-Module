<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district', 'province', 'encoder', 'household_info_id',
    ];
}
