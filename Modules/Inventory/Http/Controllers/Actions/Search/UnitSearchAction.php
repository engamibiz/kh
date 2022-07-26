<?php

namespace Modules\Inventory\Http\Controllers\Actions\Search;

use Illuminate\Http\Request;
use Modules\Inventory\IUnit;
use Carbon\Carbon;
use Exception;

class UnitSearchAction
{
    public function execute($data)
    {
        // Search units
        $units = new IUnit();

        if (isset($data['q']) && !is_null($data['q'])) {
            $units = $units->whereHas('translations', function ($translations) use ($data) {
                $translations->where('title','like','%'.$data['q'].'%');
            });
        }
        if (isset($data['tag_id']) && !is_null($data['tag_id'])) {
            $units = $units->whereHas('tags', function ($tags) use ($data) {
                $tags->where('id', $data['tag_id']);
            });
        }
        if (isset($data['region_id']) && !empty($data['region_id']) && is_array($data['region_id'])) {
            $units = $units->where(function ($query) use ($data) {
                $query->whereIn('region_id', $data['region_id']);
            });
        }
        if (isset($data['city_id']) && !empty($data['city_id']) && is_array($data['city_id'])) {
            $units = $units->where(function ($query) use ($data) {
                $query->whereIn('city_id', $data['city_id']);
            });
        }
        if (isset($data['keyword']) && !empty($data['keyword'])) {
            $units = $units->whereHas('city', function ($query) use ($data) {
                $query->whereHas('translations', function ($translations) use ($data) {
                    $translations->where('name', $data['keyword']);
                });
            });
        }
        if (isset($data['project_keyword']) && !empty($data['project_keyword'])) {
            $units = $units->whereHas('project', function ($query) use ($data) {
                $query->whereHas('translations', function ($translations) use ($data) {
                    $translations->where('project', $data['project_keyword']);
                });
            });
        }
        if (isset($data['project_id'])) {
            $units = $units->where('i_project_id', $data['project_id']);
        }
        if (isset($data['bedrooms'])) {
            $units = $units->whereIn('i_bedroom_id', $data['bedrooms']);
        }
        if (isset($data['bathrooms'])) {
            $units = $units->whereIn('i_bedroom_id', $data['bathrooms']);
        }
        // Default to total_unit_price
        if (isset($data['price_from'])) {
            $units = $units->where('price', '>=', $data['price_from']);
        }
        if (isset($data['price_to'])) {
            $units = $units->where('price', '<=', $data['price_to']);
        }
        // Default to total_unit_area
        if (isset($data['area'])) {
            $units = $units->where('area', '>=', $data['area']);
        }

        if (isset($data['facilities']) && !empty($data['facilities'])) {
            $units = $units->whereHas('facilities', function ($facility) use ($data) {
                $facility->whereIn('id', $data['facilities']);
            });
        }

        if (isset($data['amenities']) && !empty($data['amenities'])) {
            $units = $units->whereHas('amenities', function ($facility) use ($data) {
                $facility->whereIn('id', $data['amenities']);
            });
        }
        if (isset($data['location_id']) && !empty($data['location_id'])) {
            $units = $units->where(function ($query) use ($data) {
                $query->where('city_id', $data['location_id']);
            });
        }

        if (isset($data['delivery_date_from'])) {
            try {
                $from = Carbon::createFromFormat('m/d/Y', $data['delivery_date_from'])->format('Y-m-d') . ' 00:00:00';
                $from = Carbon::createFromFormat('Y-m-d H:i:s', $from, auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->timezone('UTC')->toDateTimeString();
            } catch (Exception $e) {
                $from = null;
            }
            if ($from) {
                $units = $units->whereHas('project', function ($project) use ($from) {
                    $project->where('delivery_date', '>=', $from);
                });
            }
        }

        if (isset($data['delivery_date_to'])) {
            try {
                $to = Carbon::createFromFormat('m/d/Y', $data['delivery_date_to'])->format('Y-m-d') . ' 00:00:00';
                $to = Carbon::createFromFormat('Y-m-d H:i:s', $to, auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->timezone('UTC')->toDateTimeString();
            } catch (Exception $e) {
                $to = null;
            }
            if ($to) {
                $units = $units->whereHas('project', function ($project) use ($to) {
                    $project->where('delivery_date', '<=', $to);
                });
            }
        }


        if (isset($data['offering_types']) && !empty($data['offering_types'][0])) {
            $offering_types = $data['offering_types'];
            $units = $units->whereIn('i_offering_type_id', $offering_types);
        }

        if (isset($data['payment_methods']) && !empty($data['payment_methods'])) {
            $units = $units->whereIn('i_payment_method_id', $data['payment_methods']);
        }

        if (isset($data['purpose_ids']) && !empty($data['purpose_ids'][0])) {
            $units = $units->whereIn('i_purpose_id', $data['purpose_ids']);
        }

        if (isset($data['purpose_id']) && !empty($data['purpose_id'])) {
            $units = $units->whereHas('purpose', function ($purpose) use ($data) {
                $purpose->whereHas('translations', function ($translations) use ($data) {
                    $translations->where('purpose', 'like', '%' . $data['purpose_id'] . '%');
                });
            });
        }

        if (isset($data['purpose_type_ids']) && !empty($data['purpose_type_ids'])) {
            $units = $units->whereIn('i_purpose_type_id', $data['purpose_type_ids']);
        }

        if (isset($data['developers']) && !empty($data['developers'])) {
            $developers = $data['developers'];
            $units = $units->whereHas('project', function ($project) use ($developers) {
                $project->whereIn('developer_id', $developers);
            });
        }

        if (isset($data['finishing_types']) && !empty($data['finishing_types'])) {
            $units = $units->whereIn('i_finishing_type_id', $data['finishing_types']);
        }
        if (isset($data['furnishing_statuses']) && !empty($data['furnishing_statuses'])) {

            $units = $units->whereIn('i_furnishing_status_id', $data['furnishing_statuses']);
        }

        if ((isset($data['ready_for_deliver']) && !empty($data['ready_for_deliver']))) {
            $units = $units->where('ready_to_move', 1);
        }
        if ((isset($data['not_ready_for_deliver']) && !empty($data['not_ready_for_deliver']))) {
            $units = $units->where('ready_to_move', 0);
        }

        if (isset($data['sort']) && !empty($data['sort'])) {
            switch ($data['sort']) {
                case 'featured':
                    $units = $units->where('is_featured', 1);
                    break;
                case 'asc_price':
                    $units = $units->orderBy('price', 'asc');
                    break;
                case 'desc_price':
                    $units = $units->orderBy('price', 'desc');
                    break;
                case 'asc_date':
                    $units = $units->orderBy('created_at', 'asc');
                    break;
                case 'desc_date':
                    $units = $units->orderBy('created_at', 'desc');
                    break;
                default:
                    # code...
                    break;
            }
        } else {
            $units = $units->orderBy('created_at', 'DESC');
        }

        return $units->active();
    }
}
