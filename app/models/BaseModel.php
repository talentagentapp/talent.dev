<?php

use Carbon\Carbon;

//write rules for all the models

use \Esensi\Model\Model;

class BaseModel extends Model
{
    const DATE_FORMAT = "F jS, Y @ g";

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