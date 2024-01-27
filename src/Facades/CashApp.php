<?php

namespace NjoguAmos\CashApp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \NjoguAmos\CashApp\CashApp
 */
class CashApp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \NjoguAmos\CashApp\CashApp::class;
    }
}
