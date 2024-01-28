<?php

namespace NjoguAmos\CashApp\Exceptions;

class InvalidRegionException extends \Exception
{
    public function __construct()
    {
        parent::__construct(message: 'The regions provided is unrecognized. Please set the region to one of the supported values..');
    }
}
