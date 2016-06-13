<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'specialities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['intituleEtab', 'intituleProf'];
}
