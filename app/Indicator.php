<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'indicators';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'description', 'unity', 'valUs'];

}
