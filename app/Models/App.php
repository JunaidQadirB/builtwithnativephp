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

    public function downloadUrls()
    {
        $isPlatform = $this->platforms
            ->map(function ($platform) {
                return (object)[
                    'name' => $platform->name,
                    'slug' => $platform->slug,
                    'url' => url("/apps/{$this->slug}/download/" . $platform->slug),
                ];
            })->toArray();
        if (count($isPlatform) > 0) {
            return (object)$isPlatform;
        }

        return null;
    }

    public function similarApps()
    {
        // Apps in categories as this app
        // ignore self
        // limit to 3

        return self::whereHas('categories', function ($query) {
            $query->whereIn('slug', $this->categories->pluck('slug'));
        })
            ->where('slug', '!=', $this->slug)
            ->limit(3)
            ->get();
    }

    public function publisher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AppPublisher::class, 'publisher_id');
    }
}
