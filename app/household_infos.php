<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class household_infos extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_serial_no', 'brgy_id', 'brgy_chairman_id', 'committee', 'midwife_ndp_assigned',
        'purok_id', 'date_profiled', 'interviewed_by', 'nhts',
        'nhts_no', 'ip', 'cct', 'non_nhts', 'tribe', 'philhealth_no', 'ip_no',
    ];
}
