<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mch extends Model
{
    protected $table = "mch";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'g', 'p','rcode','weight','lmp','edc'
    ];
}
