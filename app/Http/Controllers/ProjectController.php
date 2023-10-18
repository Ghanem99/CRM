<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crm\Project\Services\ProjectService;

use Crm\Project\Requests\CreateProject;

class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerService $customerService;

    public function __construct(ProjectService $projectService, CustomerService $customerService)
    {
        $this->projectService = $projectService;
        $this->customerService = $customerService;
    }

    public function createProject(CreateProject $project, $customerId)
    {
        $customer = $this->customerService->show($customerId);

        return $this->projectService->createProject($project, $customerId);   
    }
}