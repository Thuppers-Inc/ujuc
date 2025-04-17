<?php

namespace App\View\Components\Site;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormationsCta extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Une question sur nos formations ?',
        public string $text = 'N\'hésitez pas à nous contacter pour obtenir plus d\'informations sur nos programmes de formation et sur les modalités d\'inscription.'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.site.formations-cta');
    }
} 