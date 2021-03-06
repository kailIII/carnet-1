<?php

namespace Carnet;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';
    protected $fillable = ['ci', 'full_name', 'phone', 'address'];

    public function registers()
    {
    	return $this->hasMany('Carnet\Register', 'person_id');
    }
}
