<?php

namespace Crm\Project\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Crm\Project\Models\Project;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $project;

    /**
     * Create a new event instance.
     */
    public function __construct(Project $project)
    {
        $this->setProject($Project);
    }

    public function setProject($project)
    {
        $this->project = $project;
    }

    public function getProject() : Project
    {
        return $this->project;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
