<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'insurances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'pseudo', 'name', 'address', 'email', 'tel', 'fax', 'green_number', 'web_site', 'percentage'];
}
