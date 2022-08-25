<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    protected $casts = [
        'started_at' => 'date',
        'finished_at' => 'date'
    ];

    protected $guarded = [];
}
