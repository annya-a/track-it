<?php

namespace App\Modules\Companies\Models;

use App\Modules\Companies\Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return new CompanyFactory;
    }
}
