<?php

namespace Crm\Customer\Listeners;

use Crm\Customer\Events\CustomerCreationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWelcomeEmailListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerCreationEvent $event): void
    {
        //
    }
}
