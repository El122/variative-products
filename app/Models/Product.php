<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'vendor',
        'description',
        'category_id',
    ];

    // Relations

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function variations(): HasMany {
        return $this->hasMany(Variation::class);
    }
}
