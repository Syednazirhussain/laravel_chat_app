<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Roles extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'roles';

    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at"; 

    protected $dates = ['deleted_at'];

    public $fillable = ['name'];

}
