<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VariationFilter extends Model {
    use HasFactory;

    protected $fillable = ['value', 'variation_id', 'filter_id'];
    public $timestamps = false;

    // Relations

    public function variation(): BelongsTo {
        return $this->belongsTo(Variation::class);
    }

    public function filter(): BelongsTo {
        return $this->belongsTo(Filter::class);
    }
}
