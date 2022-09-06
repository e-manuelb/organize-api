<?php

namespace App\Models;

class Roles
{
    const ADMIN = 0;
    const USER = 1;

    protected $table = 'roles';
    protected $fillable = ['name'];
}
