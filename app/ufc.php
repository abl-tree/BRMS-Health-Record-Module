<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ufc extends Model
{
    protected $table = "ufc_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
       protected $fillable = [
        'age', 'mother_name', 'father_name','fdg','weight','r_code','remarks'
    ];
}
