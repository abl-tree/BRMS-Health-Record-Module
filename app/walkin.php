<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class walkin extends Model
{
    protected $table = "walkin";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'walkin_id', 'blood_pressure', 'blood_sugar','consultation','findings','notes','medicine','med_quantity'
    ];
}
