<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crm\Project\Services\ProjectService;

use Crm\Project\Requests\CreateProjectRequest;
use Crm\Customer\Models\Customer;

use Crm\Customer\Services\CustomerService;

class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerService $customerService;

    public function __construct(ProjectService $projectService, CustomerService $customerService)
    {
        $this->projectService = $projectService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
    }

    public function store(CreateProjectRequest $request, $customer_id)
    {
        $customer = $this->customerService->show($customer_id); 

        return $this->projectService->createProject($request, $customer_id);
    }


}
