<?php 

namespace Crm\Project\Services;

use Crm\Project\Models\Project;
use Crm\Project\Events\ProjectCreationEvent;
use Crm\Project\Requests\CreateProjectRequest;
use Crm\Customer\Models\Customer;

class ProjectService
{
    public function createProject(CreateProjectRequest $request, $customerId): Project
    {
        $project = new Project();
        $project->name = $request->name;
        $project->status = $request->status;
        $project->customer_id = $customerId;
        $project->cost = $request->cost;
        $project->save();

        event(new ProjectCreationEvent($project));
        return $project;
    }

    public function getAllProjects(): array
    {
        return Project::all()->toArray();
    }
}