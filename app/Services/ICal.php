<?php namespace App\Services;

use Eluceo\iCal\Component\Calendar;
use Eluceo\iCal\Component\Event;

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
        $vCalendar = new Calendar($this->domain."/".$this->code);
        $vCalendar->setName($this->code);
        $vCalendar->setTimezone('America/New_York');

        $vEvent = new Event();
        $vEvent
            ->setDtStart()
            ->setDtEnd(new \DateTime('2012-12-24'))
            ->setNoTime(true)
            ->setSummary('Christmas');

        $vCalendar->addComponent($vEvent);

        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="cal.ics"');

        echo $vCalendar->render();
    }
}