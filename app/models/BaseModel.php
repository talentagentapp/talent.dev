<?php

use Carbon\Carbon;

//write rules for all the models

class BaseModel extends Eloquent
{
    const DATE_FORMAT = 'l F jS Y @ g:i a';

    public function getCreatedAtAttribute($value)
    {
        $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
        return $utc->setTimezone('America/Chicago');
    }

    public function getUpdatedAtAttribute($value)
    {
        $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
        return $utc->setTimezone('America/Chicago');
    }
}