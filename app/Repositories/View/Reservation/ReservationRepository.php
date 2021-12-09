<?php namespace App\Repositories\View\Reservation;

use App\Models\Customer;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function get($id)
    {
        return Reservation::find($id);
    }
    public function create(object $data)
    {
        //dd($data);
        $session = session()->get('rent_session');

        $customer_id = Str::uuid()->toString();
        $customerSave = new Customer();
        $customerSave->id = $customer_id;
        $customerSave->fullName = $data->fullName;
        $customerSave->email = $data->email;
        $customerSave->phone = $data->phone;
        $customerSave->taxTitle = $data->taxTitle;
        $customerSave->tax = $data->tax;
        $customerSave->taxNumber = $data->taxNumber;
        $customerSave->taxAddress = $data->taxAddress;
        $customerSave->address = $data->taxAddress;
        $customerSave->is_einvoice = $data->is_einvoice;
        $customerSave->is_status = 1;
        $customerSave->tenant_id = $session['tenant_id'];
        $customerSave->save();

        $checkin = Carbon::parse($data->checkin);

        $id = Str::uuid()->toString();
        $save = new Reservation();
        $save->id = $id;
        $save->customer_id = $customer_id;
        $save->villa_id = $data->villa_id;
        $save->checkin = $data->checkin;
        $save->checkout = $data->checkout;
        $save->days = $checkin->diffInDays($data->checkout);
        $save->fullname = $data->fullName; //varchar(255)
        $save->price = $data->price; //varchar(255)
        $save->deposit = $data->deposit; //varchar(255)
        $save->status_id = '4464d45e-52a2-11ec-bf63-0242ac130002'; //varchar(255)
        $save->tenant_id = $session['tenant_id']; //char(36)
        $save->save();
        return $id;
    }
    public function update(object $data)
    {
        Reservation::find($data)->update($data);
    }

    public function check(object $data)
    {
        return DB::table('reservations')->where('villa_id', $data->id)
            ->where('checkin', '<=', $data->checkout)
            ->where('checkout', '>=', $data->checkin)
            ->get();
    }

    public function all()
    {
        // TODO: Implement all() method.
    }
}