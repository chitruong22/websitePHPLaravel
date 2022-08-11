<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'discount',
        'image',
        'image_list',
        'short_description',
        'description',
        'availability',
        'information',
        'view',
        'outstanding',
        'catalog_id',
    ];

}
