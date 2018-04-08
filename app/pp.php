<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pp extends Model
{
    protected $table = "pp_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'PlaceofDelivery', 'attended_by','gender','weight','fdg','date_of_pp'
    ];
}
