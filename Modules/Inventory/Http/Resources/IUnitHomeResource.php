<?php

namespace Modules\Inventory\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserMinimalResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Modules\Inventory\Http\Resources\IFacilityMinimalResource;
use Modules\Inventory\Http\Resources\IAmenityMinimalResource;
use App\Http\Resources\MediaResource;
use App\Http\Resources\UserResource;
use Modules\Inventory\IUnit;
use Modules\Locations\Http\Resources\LocationMiniResource;
use Modules\Locations\Http\Resources\LocationResource;
use Modules\Ratings\Http\Resources\RatingResource;
use Modules\Tags\Http\Resources\TagResource;
use Propaganistas\LaravelIntl\Facades\Currency;

class IUnitHomeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $availability = null;
        // Check sold
        if ($this->buyer) {
            $availability = Lang::get('inventory::inventory.sold');
        }
         
        $price = null;
        // hundreds
        if ($this->price <= 999) {
            $price = $this->price;
        }
        // thousands
        else if ($this->price >= 1000 && $this->price <= 999999) {
            $price = round(($this->price / 1000),2).'K';
        }
        // millions
        else if ($this->price >= 1000000 && $this->price <= 999999999) {
            $price = round(($this->price / 1000000),2).'M';
        }
        // billions
        else if ($this->price >= 1000000000 && $this->price <= 999999999999) {
            $price = round(($this->price / 1000000000),2).'B';
        } else {
            $price = $this->price;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'default_title' => $this->default_title,
            'slug' => $this->slug,
            'project' => $this->project ? new IProjectMinimalResource($this->project) : null,
            // 'unit_number' => $this->unit_number,
            // 'building_number' => $this->building_number,
            // 'seller' => $this->seller ? new UserResource($this->seller) : null,
            // 'position' => $this->position ? $this->position->value : null,
            // 'view' => $this->view ? $this->view->value : null,
            'area' => $this->area ? round($this->area, 2) : null,
            // 'roof_area' => $this->roof_area ? round($this->roof_area, 2) : null,
            // 'terrace_area' => $this->terrace_area ? round($this->terrace_area, 2) : null,
            // 'garden_area' => $this->garden_area ? round($this->garden_area, 2) : null,
            // 'plot_area' => $this->plot_area ? round($this->plot_area, 2) : null,
            // 'build_up_area' => $this->build_up_area ? round($this->build_up_area, 2) : null,
            'bedroom' => $this->bedroom ? $this->bedroom->count : null,
            'bathroom' => $this->bathroom ? $this->bathroom->count : null,
            // // 'floor_number' => $this->floorNumber ? $this->floorNumber->value : null,
            // 'purpose' => $this->purpose ? $this->purpose->value : null,
            // 'purpose_type' => $this->purposeType ? $this->purposeType->value : null,
            // 'purpose_type_id' => $this->i_purpose_type_id,
            'country' => !empty($this->country) && !is_null($this->country) ?  new LocationMiniResource($this->country) : null,
            'region' => !empty($this->region) && !is_null($this->region) ? new LocationMiniResource($this->region) : null,
            'city' => !empty($this->city) && !is_null($this->city) ? new LocationMiniResource($this->city) : null,
            'area_place' => !empty($this->areaPlace) && !is_null($this->areaPlace) ? new LocationMiniResource($this->areaPlace) : null,
            'city_name' => $this->city ? (new LocationMiniResource($this->city))->name : null,
            // 'latitude' => (float) $this->latitude,
            // 'longitude' => (float) $this->longitude,
            // 'video' => $this->video,
            // 'address' => $this->address ? $this->address : null,
            'offering_type' => ($this->offeringType && $this->offeringType->value) ? $this->offeringType->value : $this->offeringType->default_value,
            // 'description' => $this->description ? $this->description : $this->default_description,
            'price' => $price,
            'currency_code' => $this->currency_code,
            'price_per_meter' => $this->price_per_meter,
            // 'full_price' => $this->price ?  Currency::formatAccounting($this->price, $this->currency_code ? $this->currency_code : 'EGP') : null,
            // 'payment_method' => $this->paymentMethod ? $this->paymentMethod->value : null,
            // 'buyer' => $this->buyer ? new UserMinimalResource($this->buyer) : null,
            // // 'down_payment' => $this->down_payment,
            // // 'down_payment_string' => $this->down_payment ? Currency::formatAccounting($this->down_payment, $this->currency_code ? $this->currency_code : 'EGP') : null,
            // 'installments_string' => $this->installments ? Currency::formatAccounting($this->installments, $this->currency_code ? $this->currency_code : 'EGP') : null,
            // // 'number_of_installments' => $this->number_of_installments,
            // 'installments' => $this->installments,
            'area_unit' => $this->areaUnit ? $this->areaUnit->value : null,
            // 'garden_area_unit' => $this->gardenAreaUnit ? $this->gardenAreaUnit->value : null,
            // 'furnishing_status' => $this->furnishingStatus ? $this->furnishingStatus->value : null,
            // 'finishing_type' => $this->finishingType ? $this->finishingType->value : null,
            // 'design_type' => $this->designType ? $this->designType->value : null,
            // 'availability' => $availability,
            // // 'url' => route('inventory.units.unit', ['id' => $this->id]),
            // 'facilities' => $this->facilities ? IFacilityMinimalResource::collection($this->facilities) : null,
            // 'amenities' => $this->amenities ? IAmenityMinimalResource::collection($this->amenities) : null,
            // 'tags' => $this->tags ? TagResource::collection($this->tags) : null,
            // 'attachmentables' => $this->attachmentables ? MediaResource::collection($this->attachmentables) : null,
            'attachments' => $this->attachments ? MediaResource::collection($this->attachments) : null,
            // 'floor_plans' => $this->floorPlans ? MediaResource::collection($this->floorPlans) : null,
            // 'master_plans' => $this->masterPlans ? MediaResource::collection($this->masterPlans) : null,
            // 'is_featured' => $this->is_featured,
            // 'is_active' => $this->is_active,
            // 'rate' => !is_null($this->ratings) && !empty($this->ratings) ? floor($this->ratings()->avg('rate')) : null,
            // 'class' => get_class($this->resource),
            // 'images' => !empty($this->images) ? $this->images : [],
            // 'created_at' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            // 'updated_at' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            // 'created_since' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->diffForHumans() : null,
            // 'updated_since' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->diffForHumans() : null,
        ];
    }
}
