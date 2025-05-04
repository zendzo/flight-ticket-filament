<?php

namespace App\View\Components\Flight;

use App\Models\Flight;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Info extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Flight $flight,
        public array $totalPassengers = [],
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.flight.info');
    }
}
