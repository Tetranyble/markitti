<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Rating extends Component
{

    public $rating;
    public $avgRating;
    public $product;

    public function recordRating($reviewable, $star){
        $reviewable->rate($star);
    }

    public function mount($product) {
        $this->product = $product;
        $userRating = $this->product->reviews()
            ->where('user_id', auth()->id())->first();

        if (!$userRating) {
            $this->rating = 0;
        } else {
            $this->rating = $userRating->star;
        }

        $this->calculateAverageRating();
    }

    private function calculateAverageRating() {
        $review = $this->product->reviews()->avg('star');
        $this->avgRating = round($review,1);
        $this->rating = round($review);
    }

    public function setRating($val)
    {
        if ($this->rating == $val) {    // user can click on the same rating to reset the value
            $this->rating = 0;
        } else {
            $this->rating = $val;
        }

        $this->product->rate($val);
        $this->calculateAverageRating();
    }

    public function render()
    {
        return <<<'blade'
            <a class="d-inline-flex align-items-center mb-3" href="#">
               <div class="d-flex gap-1 me-2">
               @for ($i = 0; $i < $this->rating; $i++)
                   <img wire:click="setRating({{ $i+1}})" src="{{ asset('assets/images/icons/star.svg') }}" alt="Review rating" width="16">
               @endfor

               @for ($i = $this->rating; $i < 5; $i++)
                   <img wire:click="setRating({{ $i+1}})" src="{{ asset('assets/images/icons/star-muted.svg') }}" alt="Review rating" width="16">
               @endfor
               </div>

               <span class="small">{{ $avgRating }}</span>
           </a>
        blade;
    }
}
