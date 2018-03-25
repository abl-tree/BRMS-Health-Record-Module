<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanitationTypes extends Model
{
    public function option() {
        return $this->hasMany('App\SanitationOption', 'sanitation_type_id', 'id');
    }
}
