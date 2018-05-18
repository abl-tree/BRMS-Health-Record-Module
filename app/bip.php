<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bip extends Model
{
    protected $table = "bip_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'BP', 'client_type','f_history','remarks'
    ];
}
