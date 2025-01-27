<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Step extends Model
{
    protected $table = 'steps';

    protected $fillable = ['name', 'started_at', 'finished_at'];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }
}
