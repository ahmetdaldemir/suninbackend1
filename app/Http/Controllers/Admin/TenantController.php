<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Tenant\TenantRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantController extends Controller
{
    private TenantRepositoryInterface $TenantRepository;

    public function __construct(TenantRepositoryInterface $TenantRepository)
    {
        $this->TenantRepository = $TenantRepository;
    }

    public function index()
    {
        return response()->json($this->TenantRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->TenantRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->TenantRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->TenantRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->TenantRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
