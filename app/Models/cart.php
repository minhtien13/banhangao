<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'curtomer_id',
        'product_id',
        'price',
        'qty'
    ];

    public function product()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
}