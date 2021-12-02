<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Reservation\ReservationRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationController extends Controller
{
    private ReservationRepositoryInterface $ReservationRepository;

    public function __construct(ReservationRepositoryInterface $ReservationRepository)
    {
        $this->ReservationRepository = $ReservationRepository;
    }

    public function index()
    {
        $data['reservations'] = $this->ReservationRepository->all();
        //dd($data['reservations']);
        return view('rent/reservation/list',$data);
    }

    public function create(Request $request)
    {
        $data['villa'] = [];
        return view('rent/reservation/new',$data);
    }

    public function search(Request $request)
    {
        //dd($request);
        $data['checkin']  = $request->checkin;
        $data['checkout']  = $request->checkout;
        $data['price']  = 15000;
        $data['deposit']  = 5000;
        $data['villa'] = $this->ReservationRepository->search($request);
        return view('rent/reservation/new',$data);
    }

    public function payment(Request $request)
    {
        //dd($request->id);
        $data['reservation'] = $this->ReservationRepository->get($request->id);
        return view('rent/reservation/payment',$data);
    }

    public function store(Request $request)
    {
        $id = $this->ReservationRepository->create($request);
        return response()->json(['success' => 'İştem Tamamlandı!','id' => $id], 200);
    }
}
