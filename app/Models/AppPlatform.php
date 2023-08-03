<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppPlatform extends Model
{
    use HasFactory;

    public function apps(): HasMany
    {
        return $this->hasMany(App::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
