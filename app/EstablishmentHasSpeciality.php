<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentHasSpeciality extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'establishment_has_speciality';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['establishment_id', 'speciality_id'];

}
