<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruitment extends Model
{

    protected $table = 'recruitments';

    protected $fillable = ['_token','name', 'contact', 'email_address'];

    use HasFactory;
    use SoftDeletes;
}
