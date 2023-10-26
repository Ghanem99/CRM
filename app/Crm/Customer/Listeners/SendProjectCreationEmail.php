<?php

namespace Crm\Customer\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Crm\Project\Events\ProjectCreationEvent;
use Crm\Customer\Services\CustomerService;

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
    public function handle(ProjectCreationEvent $event): void
    {
        $project = $event->getProject();

        $customerId = $project->customer_id;

        $customer = $this->customerService->show($customerId);

        dd($customer, $project);
    }
}
