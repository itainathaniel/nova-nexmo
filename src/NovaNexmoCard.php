<?php

namespace Itainathaniel\NovaNexmo;

use Laravel\Nova\Card;

class NovaNexmoCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-nexmo';
    }

    /**
     * Set number of decimals to show
     *
     * @param number $resources
     * @return void
     */
    public function decimals($decimals=2)
    {
        $this->withMeta([
            'decimals' => $decimals
        ]);

        return $this;
    }
}
