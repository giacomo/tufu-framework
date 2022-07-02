<?php

/**
 * Project      tufu
 * @author      Giacomo Barbalinardo <info@ready24it.eu>
 * @copyright   2016
 */

namespace App\Model;

use Tufu\Core\Model;

class User extends Model
{
    protected $fillable = ['first_name', 'last_name'];

    protected $hidden = ['code'];
}
