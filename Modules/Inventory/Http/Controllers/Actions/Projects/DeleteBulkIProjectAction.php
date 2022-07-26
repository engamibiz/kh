<?php

namespace Modules\Inventory\Http\Controllers\Actions\Projects;

use Modules\Inventory\IProject;

class DeleteBulkIProjectAction
{
    public function execute($projects_ids)
    {
        foreach ($projects_ids as $project_id) {
            // Get the project
            $project = IProject::find($project_id);
    
            // Delete the project
            $project->delete();
        }

        // Return the response
        return null;
    }
}
