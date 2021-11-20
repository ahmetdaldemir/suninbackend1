<?php namespace App\Services;


use DateTime;
use Spatie\CalendarLinks\Link;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

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
       $x = Calendar::create('xvİLLA')
            ->event(Event::create('öZGÜR')
                ->startsAt(new DateTime('2021-05-05'))
                ->endsAt(new DateTime('2021-05-10'))
            )
           ->event(Event::create('AHMET')
               ->startsAt(new DateTime('2021-05-05'))
               ->endsAt(new DateTime('2021-05-10'))
           )
           ->event(Event::create('RAMAZAN')
               ->startsAt(new DateTime('2021-05-05'))
               ->endsAt(new DateTime('2021-05-10'))
           )
            ->get();
       return $x;
//        return response($x, 200, [
//            'Content-Type' => 'text/calendar',
//            'Content-Disposition' => 'attachment; filename="Test198711adssas.ics"',
//            'charset' => 'utf-8',
//        ]);
    }

    public function get()
    {
        $x = Calendar::create('Test1987')->get();
        return $x;
    }


}