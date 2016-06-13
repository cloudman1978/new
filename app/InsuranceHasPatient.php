<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceHasPatient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'insurance_has_patient';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['insurance_id', 'patient_id', 'affiliation'];
}
