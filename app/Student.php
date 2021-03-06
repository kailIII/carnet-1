<?php

namespace Carnet;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['ci', 'full_name', 'birthday', 'birth_place', 'gender'];

    public function registers()
    {
    	return $this->hasMany('Carnet\Register', 'student_id');
    }


    public function getGeneroAttribute()
    {
    	return ($this->gender == 'M' ? 'Masculino' : 'Femenino');
    }
    public function getFechaNacAttribute()
    {
    	$fecha = Carbon::parse($this->birthday);
        return $fecha->format('d-m-Y');
    }
    public function setBirthdayAttribute($value)
    {
        $fecha = Carbon::parse($this->value);
        $fecha = $fecha->format('Y-m-d');
        $this->attributes['birthday'] = $fecha;
    }
    public function scopeCi($query, $cedula)
    {
        if (trim($cedula) != '')
        {
            $query->where('ci', "LIKE", "%$cedula%");
        }
    }
    public function scopeName($query, $nombre)
    {
        if (trim($nombre) != '')
        {
            $query->where('full_name', "LIKE", "%$nombre%");
        }
    }
}
