<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gms extends Model
{
	 protected $table = "gms_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'complaints', 'HO_advice'
    ];
}
