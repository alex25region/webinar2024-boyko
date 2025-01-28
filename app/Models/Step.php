<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Step extends Model
{
    use HasFactory;
    protected $table = 'steps';

    protected $fillable = [
        'goal_id',
        'name',
        'started_at',
        'finished_at'
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];
}
