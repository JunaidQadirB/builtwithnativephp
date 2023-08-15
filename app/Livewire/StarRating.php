<?php

namespace App\Livewire;

use App\Models\App;
use Livewire\Component;

class StarRating extends Component
{
    public App $app;

    public ?int $rating = null;

    public bool $reviews = false;

    public function getAverageProperty(): float
    {
        return round($this->app->ratings()->avg('value'), 2);
    }

    public function rate(int $value): void
    {
        if (! auth()->check()) {
            return;
        }

        if ($this->rating === $value) {
            $this->app
                ->ratings()
                ->where('user_id', auth()->id())
                ->delete();
            $value = null;
        } else {
            $this->app->ratings()->updateOrCreate(
                ['user_id' => auth()->id()],
                ['value' => $value]
            );
        }

        $this->rating = $value;
    }

    public function render()
    {
        return view('livewire.star-rating');
    }
}
