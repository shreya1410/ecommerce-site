<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminUser extends Model
{
    use HasFactory;
    protected $fillable=[
        'admin_name',
        'admin_email',
        'admin_address','contact'
    ];
}
