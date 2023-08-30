<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Storage;

class App extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function booted()
    {
        static::addGlobalScope('publishedApps', static function ($query) {
            // only when the user is not logged in
            if (auth()->guest()) {
                $query->where('status', 'Published');

                return;
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getUrlAttribute(): string
    {
        return route('apps.show', $this);
    }

    public function getIconUrlAttribute(): bool|string
    {
        return Storage::disk('icon')->exists($this->icon)
            ? Storage::disk('icon')->url($this->icon)
            : false;
    }

    public function getFormattedPriceAttribute(): string
    {
        return config('app.currency').' '.number_format($this->price, 2);
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
            return '/vendor/blade-heroicons/m-os-'.$platform->slug.'svg';

        });
    }

    public function downloadUrls()
    {
        $isPlatform = $this->platforms
            ->map(function ($platform) {
                return (object) [
                    'name' => $platform->name,
                    'slug' => $platform->slug,
                    'url' => url("/apps/{$this->slug}/download/".$platform->slug),
                ];
            })->toArray();
        if (count($isPlatform) > 0) {
            return (object) $isPlatform;
        }

        return null;
    }

    public function similarApps()
    {
        return self::whereHas('categories', function ($query) {
            $query->whereIn('slug', $this->categories->pluck('slug'));
        })->where('slug', '!=', $this->slug)
            ->limit(3)
            ->get();
    }

    public function publisher(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'publisher_id');
    }

    public function isOwner(): bool
    {
        return auth()->check() && auth()->id() === $this->publisher_id;
    }

    public function getUserRatingAttribute()
    {
        if (auth()->guest()) {
            return $this->ratings()->avg('value');
        }

        return $this->ratings()
            ->where('user_id', auth()->id())
            ->first()->value ?? $this->ratings()->avg('value');
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(StarRating::class, 'ratable');
    }

    public function scopeDraft($query): void
    {
        $query->where('status', 'Draft');
    }

    public function scopePublish($query): void
    {
        $query->where('status', 'Publish');
    }
}
