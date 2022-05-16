<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'driver_tbl';
    protected $primaryKey = 'driver_id';
    protected $fillable = ['driver_name', 'driver_contact', 'driver_uname', 'driver_password', 'driver_address'];
}
