<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'mid',
        'content',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
        'timer',
        'reward',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function material(): BelongsTo {
        return $this->belongsTo(Material::class);
    }
}
