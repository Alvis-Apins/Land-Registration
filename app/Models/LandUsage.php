<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class LandUsage extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'identification', 'type'];

    public function unit(): BelongsToMany
    {
        return $this->belongsToMany(LandUnit::class);
    }
}
