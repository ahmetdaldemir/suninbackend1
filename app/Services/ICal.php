<?php namespace App\Services;


use DateTime;
use Spatie\CalendarLinks\Link;
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
      $x =  Link::create(
            'test',
            DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 09:00'),
            DateTime::createFromFormat('Y-m-d H:i', '2018-02-01 18:00')
        )->ics();
//        $calendar = Calendar::create('Test1');
        return response($x, 200, [
            'Content-Type' => 'text/calendar',
            'Content-Disposition' => 'attachment; filename="Test198711adssas.ics"',
            'charset' => 'utf-8',
        ]);
    }

    public function get()
    {
        $x = Calendar::create('Test1987')->get();
        return $x;
    }


}