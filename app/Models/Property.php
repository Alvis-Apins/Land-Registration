<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'cadastral_nr', 'address', 'ownership_status'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function land(): HasMany
    {
        return $this->hasMany(LandUnit::class);
    }
}
