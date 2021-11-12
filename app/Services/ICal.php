<?php namespace App\Services;


use Spatie\IcalendarGenerator\Components\Calendar;

class ICal
{

    protected $domain;
    protected $code;

    public function __construct(string $code)
    {
        $this->domain = "https://www.suninturkey.com";
        $this->code = $code;
    }

    public function create()
    {
        $calendar = Calendar::create('Test198711ad');
        return response($calendar->get(), 200, [
            'Content-Type' => 'text/calendar',
            'Content-Disposition' => 'attachment; filename="my-awesome-calendar.ics"',
            'charset' => 'utf-8',
        ]);
    }

    public function get()
    {
        $x = Calendar::create('Test1987')->get();
        return $x;
    }


}