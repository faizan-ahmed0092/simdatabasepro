<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goodluck2020 extends Model
{
    // Use the secondary database connection
    protected $connection = 'mysql2';

    // Use backticks if table name contains a dash
    protected $table = 'goodluck-2020';

    // Disable timestamps if not needed
    public $timestamps = false;

    // If you want to allow mass assignment (optional)
    // protected $guarded = [];
}
