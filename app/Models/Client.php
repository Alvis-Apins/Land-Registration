<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['state_id', 'type', 'name', 'address', 'email', 'phone'];

    public function property(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
