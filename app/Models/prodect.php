<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodect extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'user_id',
    ];
    protected $table = 'product';
    use HasFactory;
}
