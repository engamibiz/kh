<?php

namespace Modules\Inventory\Http\Controllers\Actions\Units;

use Modules\Inventory\IUnit;

class DeleteBulkIUnitAction
{
    public function execute($units_ids)
    {
        foreach ($units_ids as $unit_id) {
            // Get the i_unit
            $i_unit = IUnit::find($unit_id);
    
            // Delete the i_unit
            $i_unit->delete();
        }

        // Return the response
        return null;
    }
}
