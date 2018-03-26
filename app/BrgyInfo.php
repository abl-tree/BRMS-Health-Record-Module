<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrgyInfo extends Model
{
    protected $table = "barangay_info";

    public function purok() {
        return $this->hasMany('App\Purok', 'brgy_id', 'id');
    }
}
