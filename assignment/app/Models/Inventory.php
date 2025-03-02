<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    
    protected $table = 'inventory';

    public $timestamps = false;

    
    protected $fillable = [
        'name',
        'description',
        'product_code',
        'price'
    ];
}