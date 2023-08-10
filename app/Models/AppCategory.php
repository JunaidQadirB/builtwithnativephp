<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // only categories with status Publish will be shown on model boot
    protected static function booted()
    {
        static::addGlobalScope('status', function ($query) {
            $query->where('status', 'Publish');
        });
    }


    public function apps()
    {
        return $this->belongsToMany(App::class);
    }
}
