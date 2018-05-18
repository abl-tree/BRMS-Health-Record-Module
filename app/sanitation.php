<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanitation extends Model
{
    protected $table = "sanitation_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_toilet', 'not_proper', 'poor','without','remarks'
    ];
}
