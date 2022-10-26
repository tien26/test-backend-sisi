<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor_products extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'distributor_id', 'price'];
    protected $table = 'distributor_products';

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

    public function distributor()
    {
        return $this->hasOne(Distributors::class, 'id', 'distributor_id');
    }
}
