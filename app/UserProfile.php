<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_info';
    
    public function brgy_info() {
    	return $this->hasOne('App\BrgyInfo', 'id', 'brgy_id');
    }
}
