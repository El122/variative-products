<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filter extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'category_id',
    ];
    public $timestamps = false;

    // Relations

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function variations(): HasMany {
        return $this->hasMany(VariationFilter::class);
    }
}
