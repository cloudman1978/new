<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysePredefHasIndicator extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'analyse_predef_has_indicator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'indicator_id', 'analyse_predef_id'];

}
