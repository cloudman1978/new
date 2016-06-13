<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rdv';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'hour', 'state', 'rqs', 'establishment_id', 'user_id', 'patient_id'];

}
