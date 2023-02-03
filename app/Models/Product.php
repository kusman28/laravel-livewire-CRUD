<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const TABLE_NAME = 'products';
    
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'name', 'description', 'price'
    ];

    public $timestamps = true;
}
