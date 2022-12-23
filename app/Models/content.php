<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',  
        'user_id',
    ];
    use HasFactory;
    protected $table = 'content';
}
