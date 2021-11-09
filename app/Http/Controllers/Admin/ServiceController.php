<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    private ServiceRepositoryInterface $ServiceRepository;

    public function __construct(ServiceRepositoryInterface $ServiceRepository)
    {
        $this->ServiceRepository = $ServiceRepository;
    }

    public function index()
    {
        return response()->json($this->ServiceRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->ServiceRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->ServiceRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->ServiceRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->ServiceRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
