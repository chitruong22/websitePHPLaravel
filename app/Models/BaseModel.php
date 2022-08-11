<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    public function selectQuery($sql_stmt){
        return DB::select($sql_stmt);
    }
    public function sqlStatement($sql_stmt){
        DB::statement($sql_stmt);
    }
}

