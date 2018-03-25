<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanitationOption extends Model
{
    public function type() {
        return $this->hasOne('App\SanitationTypes', 'id', 'sanitation_type_id');
    }
}
