<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes, HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'bills';
    protected $fillable = [
        'id_order',
        'name',
        'email',
        'phone',
        'address',
        'note',
        'count',
        'total',
        'payment_status',
        'delivery_status',
        'id_user'
    ];
}
