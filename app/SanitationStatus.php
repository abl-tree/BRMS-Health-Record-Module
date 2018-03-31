<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanitationStatus extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sanitation_opt_id', 'household_id',
    ];
}
