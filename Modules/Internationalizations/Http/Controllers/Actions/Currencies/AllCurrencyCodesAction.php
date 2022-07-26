<?php

namespace Modules\Internationalizations\Http\Controllers\Actions\Currencies;

use Cache;
use Propaganistas\LaravelIntl\Facades\Currency;
use stdClass;

class AllCurrencyCodesAction
{
    public function __construct()
    {
        //
    }

    public function execute()
    {
        return Cache::rememberForever('internationalizations_module_currency_codes', function() {
            $currencies = Currency::all();
            $currency_codes_list = array_keys($currencies);

            return $currency_codes_list;
        });
    }
}