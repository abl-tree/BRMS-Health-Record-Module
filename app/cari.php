<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cari extends Model
{
    protected $table = "cari_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'complaints', 'HO_advice'
    ];
}
