<?php

namespace App\Http\Controllers\Web\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Compares\Http\Controllers\Actions\GetComparesAction;
use Modules\Inventory\Http\Controllers\Actions\Projects\GetIProjectByIdAction;
use Modules\Inventory\Http\Controllers\Actions\Projects\GetIProjectByPublishUuidAction;
use Modules\Inventory\Http\Controllers\Actions\Projects\GetProjectUnitsPurposeTypesAction;
use Modules\Inventory\Http\Resources\IProjectHomeResource;
use Modules\Inventory\IProject;
use Modules\Settings\Http\Controllers\Actions\Contacts\GetContactsAction;

class ProjectsController extends Controller
{
    public function features()
    {
        $action = new GetComparesAction;
        $compares = json_decode(json_encode($action->execute()));

        return [
            'compares' => $compares,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, GetIProjectByIdAction $action)
    {
        switch ($id) {
            case 324:
                $id = 325;
                break;
            case 232:
                $id = 233;
                break;
            default:
                # code...
                break;
        }
        $project = json_decode(json_encode($action->execute($id)));

        // Get Unit Types
        $action = new GetProjectUnitsPurposeTypesAction();
        $project_units_purpose_types = $action->execute($project->id);
        $related_projects = json_decode(json_encode(IProjectHomeResource::collection(IProject::where(function ($query) use ($project) {
            if ($project->city) {
                $query = $query->where('city_id', $project->city->id);
            }
        })->take(10)->get())));

        $features = $this->features();
        $features['single_project'] = $project;
        $features['project_units_purpose_types'] = $project_units_purpose_types;
        $features['related_projects'] = $related_projects;
        return view('front.pages.single-project', $features);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish($id, GetIProjectByPublishUuidAction $action)
    {
        $project = json_decode(json_encode($action->execute($id)));
        $landing_contacts =  json_decode(json_encode((new GetContactsAction)->execute()));
        $features = $this->features();
        $features['single_project'] = $project;
        $features['landing_contacts'] = $landing_contacts;

        return view('front.pages.landing_page', compact('project','landing_contacts'));
    }
}
