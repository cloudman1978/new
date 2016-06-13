<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientHasAnalyse extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_has_analyse';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'patient_id', 'demandDate', 'resultDate', 'doctor_id', 'labo_id', 'establishment_id'];
}
