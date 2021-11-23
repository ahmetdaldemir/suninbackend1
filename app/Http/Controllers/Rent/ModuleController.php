<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Module\ModuleRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModuleController extends Controller
{
    private ModuleRepositoryInterface $ModuleRepository;

    public function __construct(ModuleRepositoryInterface $ModuleRepository)
    {
        $this->ModuleRepository = $ModuleRepository;
    }

    public function index()
    {
        return response()->json($this->ModuleRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->ModuleRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->ModuleRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->ModuleRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->ModuleRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
