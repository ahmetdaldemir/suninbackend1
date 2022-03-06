<?php namespace App\Services;


use DateTime;
use Spatie\CalendarLinks\Link;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use Spatie\IcalendarGenerator\Properties\CalendarAddressProperty;
use Spatie\IcalendarGenerator\ValueObjects\CalendarAddress;

class ICal
{

    protected $domain;
    protected $code;

    public function __construct(string $code)
    {
        $this->domain = "https://www.sahilvillam.com";
        $this->code = $code;
    }

    public function create()
    {

        $name = rand(1111,9999);
        $calendar = Calendar::create($name);
        return response($calendar->get(), 200, [
            'Content-Type' => 'text/calendar',
            'Content-Disposition' => 'attachment; filename="my-awesome-calendar.ics"',
            'charset' => 'utf-8',
        ]);

    }


}