<?php namespace App\Repositories\View\Reservation;

interface ReservationRepositoryInterface
{

    public function get($id);

    public function all();

    public function check(object $data);

    public function create(object $data);

    public function update(object $data);

    public function calculate(object $data);
}
