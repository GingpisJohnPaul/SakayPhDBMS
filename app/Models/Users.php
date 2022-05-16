<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Users extends Model
{
    protected $table = 'users_tbl';
    protected $primaryKey = 'users_id';
    protected $fillable = ['users_name', 'users_contact', 'users_uname', 'users_password', 'users_address'];
}