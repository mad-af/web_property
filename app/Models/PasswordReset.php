<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    // use HasFactory;
    protected $fillable = array('email', 'token');
    protected $guarded = array('updated_at');
}
