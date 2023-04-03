<?php

namespace Domain\Companies\Models;

use Domain\Companies\Database\Factories\CompanyFactory;
use Domain\Users\Models\User;
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
