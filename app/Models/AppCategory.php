<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function apps(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(App::class);
    }
}
