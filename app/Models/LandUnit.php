<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LandUnit extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'land_usage_id', 'cadastral_nr', 'area', 'border_measurement_date'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function usage(): HasOne
    {
        return $this->hasOne(LandUsage::class);
    }

}
