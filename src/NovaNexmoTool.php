<?php

namespace Itainathaniel\NovaNexmo;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaNexmoTool extends Tool
{
    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-nexmo::navigation');
    }
}
