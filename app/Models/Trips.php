<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    protected $table = 'trips_tbl';
    protected $primaryKey = 'trips_id';
    protected $fillable = ['driver_id', 'trips_origin', 'trips_destination', 'trips_passenger', 'trips_bodynum', 'trips_isArchived'];
}
