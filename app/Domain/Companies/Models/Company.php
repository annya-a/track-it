<?php

namespace App\Domain\Companies\Models;

use App\Domain\Companies\Database\Factories\CompanyFactory;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return new CompanyFactory;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
