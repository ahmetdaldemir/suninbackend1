<?php namespace App\Repositories\View\Reservation;

use App\Models\Customer;
use App\Models\Reservation;
use App\Repositories\BaseRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ReservationRepository extends BaseRepository implements ReservationRepositoryInterface
{
    public function get($id)
    {
        return Reservation::find($id);
    }
    public function create(object $data)
    {
        $diff = Carbon::parse(implode("-", array_reverse(explode("/", $data->checkin))));

        if($data->newuser==1){
            $customer_id = Str::uuid()->toString();
            $customerSave = new Customer();
            $customerSave->id           = $customer_id;
            $customerSave->fullName     = $data->fullname;
            $customerSave->email        = $data->email;
            $customerSave->password     = Hash::make('123456');
            $customerSave->phone        = $data->phone;
            $customerSave->tc           = $data->tc;
            $customerSave->taxTitle     = '';
            $customerSave->tax          = '';
            $customerSave->taxNumber    = $data->tc;
            $customerSave->taxAddress   = $data->address;
            $customerSave->address      = $data->address;
            $customerSave->city         = $data->city;
            $customerSave->country      = $data->country;
            $customerSave->is_einvoice  = 0;
            $customerSave->is_status    = 1;
            $customerSave->tenant_id    = $this->getTenantId();
            $customerSave->save();
        }

        $id = Str::uuid()->toString();
        $save = new Reservation();
        $save->id = $id;
        $save->customer_id = $customer_id;
        $save->villa_id = $data->villa_id;
        $save->checkin = implode("-", array_reverse(explode("/", $data->checkin)));
        $save->checkout = implode("-", array_reverse(explode("/", $data->checkout)));
        $save->days = $diff->diffInDays(implode("-", array_reverse(explode("/", $data->checkout))));
        $save->fullname = $data->fullname; //varchar(255)
        $save->price_day = $data->price_day; //varchar(255)
        $save->discount = $data->discount; //varchar(255)
        $save->total_price = $data->total_price; //varchar(255)
        $save->rest = ($data->total_price-$data->deposit); //varchar(255)
        $save->deposit = $data->deposit; //varchar(255)
        $save->cleaning = $data->cleaning; //varchar(255)
        $save->currency_id = $data->currency_id; //varchar(255)
        $save->note = $data->note;
        $save->city = $data->city;
        $save->country = $data->country;
        $save->guests = json_encode($data->guests); //varchar(255)
        $save->status_id = '4464d45e-52a2-11ec-bf63-0242ac130002'; //varchar(255)
        $save->tenant_id = $this->getTenantId();
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