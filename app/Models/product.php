<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug_url',
        'thumb',
        'menu_id',
        'price',
        'price_sale',
        'is_active',
        'product_code',
        'product_color',
        'size',
        'sale',
        'content'
    ];
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}