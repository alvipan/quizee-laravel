<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'title',
        'content',
        'category',
        'price',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function questions(): HasMany {
        return $this->hasMany(Question::class);
    }

    public function answered(): HasMany {
        return $this->hasMany(Answered::class);
    }
}
