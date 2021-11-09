<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Regulation\RegulationRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegulationController extends Controller
{
    private RegulationRepositoryInterface $RegulationRepository;

    public function __construct(RegulationRepositoryInterface $RegulationRepository)
    {
        $this->RegulationRepository = $RegulationRepository;
    }

    public function index()
    {
        return response()->json($this->RegulationRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->RegulationRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->RegulationRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->RegulationRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->RegulationRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
