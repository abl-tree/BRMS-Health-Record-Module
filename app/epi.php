<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class epi extends Model
{
    protected $table = "epi_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'mother_name', 'father_name','fdg','weight','r_code','vaccine'
    ];
}
