<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link_url',
        'sort_by',
        'is_type',
        'is_active',
        'content',
    ];
}