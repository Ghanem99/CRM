<?php

namespace Crm\Customers\Listeners;

use Crm\Project\Events\ProjectCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProjectCreationEmail
{
    private CustomerService $customerService;
    /**
     * Create the event listener.
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerCreation $event): void
    {
        $project = $event->getProject();

        $customerId = $this->customerService->show($project->customer_id);
    }
}
