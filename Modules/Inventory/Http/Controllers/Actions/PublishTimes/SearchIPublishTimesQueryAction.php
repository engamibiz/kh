<?php

namespace Modules\Inventory\Http\Controllers\Actions\PublishTimes;

use App\User;
use Modules\Inventory\IPublishTime;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchIPublishTimesQueryAction
{
    public function execute(User $auth_user, Request $request)
    {
        // Get the i_publish_times
        $i_publish_times = (new IPublishTime)->newQuery();

        if ($request->input('i_unit_ids')) {
            $i_publish_times = $i_publish_times->whereIn('i_unit_id', $request->input('i_unit_ids'));
        }

        if ($request->input('published_from')) {
            $i_publish_times = $i_publish_times->where('from', '>=', $request->input('published_from'));
        }

        if ($request->input('published_to')) {
            $i_publish_times = $i_publish_times->where('to', '<=', $request->input('published_to'));
        }

        if ($request->input('publishers')) {
            $i_publish_times = $i_publish_times->whereIn('created_by', $request->input('publishers'));
        }

        if ($request->input('created_at_range')) {
            try {
                $dates = explode(' / ', $request->input('created_at_range'));
                if (isset($dates[0]) && $dates[0]) {
                    try {
                        $from = Carbon::createFromFormat('Y-m-d', $dates[0])->format('Y-m-d') . ' 00:00:00';
                        $from = Carbon::createFromFormat('Y-m-d H:i:s', $from, auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->timezone('UTC')->toDateTimeString();
                    } catch (Exception $e) {
                        $from = null;
                    }
                } else {
                    $from = null;
                }
                if (isset($dates[1]) && $dates[1]) {
                    try {
                        $to = Carbon::createFromFormat('Y-m-d', $dates[1])->format('Y-m-d') . ' 23:59:59';
                        $to = Carbon::createFromFormat('Y-m-d H:i:s', $to, auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->timezone('UTC')->toDateTimeString();
                    } catch (Exception $e) {
                        $to = null;
                    }
                } else {
                    $to = null;
                }

                if ($from && $to) {
                    $i_publish_times = $i_publish_times->where('created_at', '>=', $from)->where('created_at', '<=', $to);
                } elseif ($from) {
                    $i_publish_times = $i_publish_times->where('created_at', '>=', $from);
                } elseif ($to) {
                    $i_publish_times = $i_publish_times->where('created_at', '<=', $to);
                }
            } catch (\Exception $e) {
                //
            }
        }

        if ($request->input('last_updated_at_range')) {
            try {
                $dates = explode(' / ', $request->input('last_updated_at_range'));
                if (isset($dates[0]) && $dates[0]) {
                    try {
                        $from = Carbon::createFromFormat('Y-m-d', $dates[0])->format('Y-m-d') . ' 00:00:00';
                        $from = Carbon::createFromFormat('Y-m-d H:i:s', $from, auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->timezone('UTC')->toDateTimeString();
                    } catch (Exception $e) {
                        $from = null;
                    }
                } else {
                    $from = null;
                }
                if (isset($dates[1]) && $dates[1]) {
                    try {
                        $to = Carbon::createFromFormat('Y-m-d', $dates[1])->format('Y-m-d') . ' 23:59:59';
                        $to = Carbon::createFromFormat('Y-m-d H:i:s', $to, auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->timezone('UTC')->toDateTimeString();
                    } catch (Exception $e) {
                        $to = null;
                    }
                } else {
                    $to = null;
                }

                if ($from && $to) {
                    $i_publish_times = $i_publish_times->where('updated_at', '>=', $from)->where('updated_at', '<=', $to);
                } elseif ($from) {
                    $i_publish_times = $i_publish_times->where('updated_at', '>=', $from);
                } elseif ($to) {
                    $i_publish_times = $i_publish_times->where('updated_at', '<=', $to);
                }
            } catch (\Exception $e) {
                //
            }
        }

        return $i_publish_times;
    }
}
