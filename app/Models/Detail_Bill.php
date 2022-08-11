<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detail_Bill extends Model
{
    use SoftDeletes, HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'detail_bill';
    protected $fillable = [
        'product_name',
        'quantity',
        'price',
        'image',
        'id_order'
    ];
}
