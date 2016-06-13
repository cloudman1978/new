<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'establishment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['nameE', 'email', 'address', 'textLatlng', 'tel', 'tel1', 'logo', 'type_id', 'horaire'];




}
