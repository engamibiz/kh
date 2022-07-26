<?php

namespace Modules\Locations\Http\Controllers\Actions;

use Modules\Locations\Location;

class DeleteLocationAction
{
    public function execute($id)
    {
        // Get location 
        $location = Location::with('children',
        'parent')->first($id);

        // Delete location
        $location->delete();

        return null;
    }
}
