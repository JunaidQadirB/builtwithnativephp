<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getUrlAttribute(): string
    {
        return route('apps.show', $this);
    }

    function getFormattedPriceAttribute(): string
    {
        return config('app.currency') . ' ' . number_format($this->price, 2);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(AppCategory::class);
    }

    public function platforms()
    {
        return $this->belongsToMany(AppPlatform::class, 'app_app_platform', 'app_id', 'app_platform_id');
    }

    public function platformIcons()
    {
        return $this->platforms->map(function ($platform) {
            return '/vendor/blade-heroicons/m-' . $platform->slug . 'svg';

        });

    }
}
