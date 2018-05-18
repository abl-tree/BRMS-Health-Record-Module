<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb extends Model
{
     protected $table = "tb_symp_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'DOX_ray', 'date_first','sputum','submit3','date_first2','sputum2','result3'
    ];
}
