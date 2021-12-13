<?php


namespace App\Services;


use App\Models\VillaContract;
use phpseclib3\Math\PrimeField\Integer;

class Price
{

    protected $id;
    protected $startdate;
    protected $finisdate;

    public function __construct(Integer $id, DateTime $startdate, DateTime $finisdate)
    {

        $this->id = $id;
        $this->startdate = $startdate;
        $this->finisdate = $finisdate;
    }

    public function handle()
    {
        $contract = VillaContract::whereNull('deleted_at')
            ->where('villa_id', $this->id)
            ->where('startDate', '<', $this->startdate)
            ->where('finishDate', '>', $this->finishdate)->first();

        return $contract;
    }
}