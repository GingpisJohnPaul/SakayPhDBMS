<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedTrips extends Model
{
    protected $table = 'reserve_trip_tbl';
    protected $primaryKey = 'reserve_id';
    protected $fillable = ['trips_id', 'users_id', 'reserve_current', 'reserve_destination', 'reserve_description', 'reserve_status', 'reserve_timestamp'];
}
