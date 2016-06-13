<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientAnalyseHasIndicator extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_analyse_has_indicator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'indicator_id', 'pha_id', 'result'];
}
