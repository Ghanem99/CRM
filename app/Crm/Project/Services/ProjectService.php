<?php 

namespace Crm\Project\Services;

use Crm\Project\Models\Project;
use Crm\Project\Requests\CreateProject;
use Crm\Project\Events\ProjectCreation;


class ProjectService
{
    public function createProject(CreateProject $project, $customerId)
    {
        $project = new Project();
        $project->name = $project->name;
        $project->status = $project->status;
        $project->customer_id = $customerId;
        $project->project_cost = $project->project_cost;
        $project->save();

        event(new ProjectCreation($project));
        return $project;
    }
}