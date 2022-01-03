<?php


namespace App\Services\Localization;


use Illuminate\Support\Facades\Facade;

class LocalizationService extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor() :string
    {
        return 'Localization';
    }
}
