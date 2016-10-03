<?php

namespace App\Opportunities;

use Illuminate\Bus\Queueable;

abstract class Opportunity
{
    /*
    |--------------------------------------------------------------------------
    | Queueable Opportunities
    |--------------------------------------------------------------------------
    |
    | This opportunity base class provides a central location to place any logic that
    | is shared across all of your opportunities. The trait included with the class
    | provides access to the "onQueue" and "delay" queue helper methods.
    |
    */

    use Queueable;
}
