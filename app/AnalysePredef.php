<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnalysePredef extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'analyses_predef';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

}
