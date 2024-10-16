<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminModel extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "admins";
    protected $guarded = "admin";
    protected $fillable = [
        "name","email","password",
    ] ;

    protected $hidden = [
        "password","remember_token",
    ] ;
}
