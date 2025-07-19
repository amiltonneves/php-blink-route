<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function __construct()
    {
        $this->table = 'usuarios';
    }
}