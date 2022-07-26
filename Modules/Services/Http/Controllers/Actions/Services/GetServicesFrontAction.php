<?php

namespace Modules\Services\Http\Controllers\Actions\Services;

use Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Services\Service;
use Modules\Services\Http\Resources\ServiceResource;

class GetServicesFrontAction
{
    public function __construct()
    {
        //
    }
    public function execute()
    {
        // Get Services
        $services =  Service::paginate(8);

        // Transform result
        $services = ServiceResource::collection($services);

        $services = new LengthAwarePaginator(
            json_decode(json_encode($services)),
            $services->total(),
            $services->perPage(),
            $services->currentPage(),
            [
                'path' => \Request::url(),
                'query' => [
                    'page' => $services->currentPage()
                ]
            ]
        );

        // Return the result
        return $services;
    }
}
