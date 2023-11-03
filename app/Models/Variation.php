<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Variation extends Model {
    use HasFactory;

    protected $fillable = ['price', 'description', 'product_id'];

    // Relations

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function filters(): HasMany {
        return $this->hasMany(VariationFilter::class);
    }
}
