<?php namespace App\Repositories\ReservationStatus;

use App\Models\ReservationStatus;


class ReservationStatusRepository implements ReservationStatusRepositoryInterface
{

    public function get($id)
    {
        return ReservationStatus::find($id);
    }

    public function all()
    {
        return ReservationStatus::all();
    }

    public function delete($id)
    {
        ReservationStatus::destroy($id);
    }

    public function create(object $data)
    {
        ReservationStatus::save($data);
    }

    public function update(object $data)
    {
        ReservationStatus::find($id)->update($data);
    }
}
