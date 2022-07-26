<?php

namespace Modules\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\HasCompositePrimaryKey;
use Illuminate\Support\Facades\Event;
use Cache;
use Wildside\Userstamps\Userstamps;

class IFloorNumberTranslation extends Model
{
    use HasCompositePrimaryKey, SoftDeletes, SoftCascadeTrait, LogsActivity, Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    /**
     * Get the class being used to provide a User.
     *
     * @return string
     */
    protected function getUserClass()
    {
        return "App\User";
    }

    protected $table = 'i_floor_number_trans';
    protected $primaryKey = ['i_floor_number_id', 'language_id'];
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'i_floor_number_id', 'language_id', 'displayed_text', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $softCascade = [];

    protected $dates = ['deleted_at'];
    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = [];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $ignoreChangedAttributes = [];
    protected static $logOnlyDirty = true;
    protected static $logName = 'i_floor_number_translation_log';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Floor Number Translation ".$this->displayed_text." has been {$eventName}";
    }

    public function iFloorNumber()
    {
        return $this->belongsTo('Modules\Inventory\IFloorNumber', 'i_floor_number_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo('App\Language', 'language_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::created(function (IFloorNumberTranslation $ifloor_number_translation) {
            Event::dispatch('i_floor_number_translation.created', $ifloor_number_translation);
        });
        static::updated(function (IFloorNumberTranslation $ifloor_number_translation) {
            Event::dispatch('i_floor_number_translation.updated', $ifloor_number_translation);
        });
        static::saved(function (IFloorNumberTranslation $ifloor_number_translation) {
            Event::dispatch('i_floor_number_translation.saved', $ifloor_number_translation);
        });
        static::deleted(function (IFloorNumberTranslation $ifloor_number_translation) {
            Event::dispatch('i_floor_number_translation.deleted', $ifloor_number_translation);
        });
        static::restored(function (IFloorNumberTranslation $ifloor_number_translation) {
            Event::dispatch('i_floor_number_translation.restored', $ifloor_number_translation);
        });
    }
}
