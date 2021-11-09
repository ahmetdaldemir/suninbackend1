<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Destination\DestinationRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DestinationController extends Controller
{
    private DestinationRepositoryInterface $DestinationRepository;

    public function __construct(DestinationRepositoryInterface $DestinationRepository)
    {
        $this->DestinationRepository = $DestinationRepository;
    }

    public function index()
    {
        return response()->json($this->DestinationRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->DestinationRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->DestinationRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->DestinationRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->DestinationRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
