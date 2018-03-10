<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "persons";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'midName', 'lastName','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'dob','placeOfBirth','religion','nationality','highestEducationalAttainment','lastSchoolAttendance','numberOfYearsInSchool','occupationPriorToCBRAP'
    ];
}
