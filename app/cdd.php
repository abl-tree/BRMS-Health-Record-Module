<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cdd extends Model
{
  protected $table = "cdd_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'complaints', 'num_OR','remarks'
    ];
}
