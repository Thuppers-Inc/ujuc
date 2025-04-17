<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormationCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $formation
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.site.formation-card');
    }
} 