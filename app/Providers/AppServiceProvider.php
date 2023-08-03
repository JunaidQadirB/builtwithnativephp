<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('search', function ($field, $string) {
            $string = Str::of($string)->trim()->split('/[\s,]+/')->toArray();
            if(count($string) > 1) {
                return $this->where(function ($query) use ($field, $string) {
                    foreach ($string as $word) {
                        $query->orWhere($field, 'like', '%' . $word . '%');
                    }
                });
            }

            return $string
                ? $this->where($field, 'like', '%' . $string[0] . '%')
                : $this;
        });
    }
}
