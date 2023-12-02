<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soclai extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'slug_link',
        'thumb',
        'is_active'
    ];
}