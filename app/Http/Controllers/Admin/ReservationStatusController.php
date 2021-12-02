<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ReservationStatus\ReservationStatusRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationStatusController extends Controller
{
    private ReservationStatusRepositoryInterface $ReservationStatusRepository;

    public function __construct(ReservationStatusRepositoryInterface $ReservationStatusRepository)
    {
        $this->ReservationStatusRepository = $ReservationStatusRepository;
    }

    public function index()
    {
        return response()->json($this->ReservationStatusRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->ReservationStatusRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->ReservationStatusRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->ReservationStatusRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->ReservationStatusRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
