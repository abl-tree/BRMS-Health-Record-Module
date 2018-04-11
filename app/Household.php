<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district', 'province', 'encoder', 'household_info_id',
    ];

    public function info() {
        return $this->hasOne('App\household_infos', 'id', 'household_info_id');
    }

    public function encoder() {
        return $this->hasOne('App\User', 'id', 'encoder');
    }

    public function member() {
        return $this->hasMany('App\HouseholdMember', 'household_id', 'id');
    }
}
