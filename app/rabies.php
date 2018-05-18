<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rabies extends Model
{
    protected $table = "rabies_report";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'age', 'date', 'complaint_bite','remarks'
         ];
}
