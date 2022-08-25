<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobTitle extends Model
{
    use HasFactory;

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    protected $guarded = [];
}
