<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // public $timestamps=false;
    protected $fillable = [
        'product_name',
        'product_detail',
        'product_cost'
    ];
}
