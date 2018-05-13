<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fp extends Model
{
  protected $table = "fp_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'num_child', 'lmp','client_type','method_accepted','remarks'
    ];
}
