<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Roles extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'roles';
}
