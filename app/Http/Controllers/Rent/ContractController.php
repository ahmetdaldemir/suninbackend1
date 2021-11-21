<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Contract\ContractRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContractController extends Controller
{
    private ContractRepositoryInterface $ContractRepository;

    public function __construct(ContractRepositoryInterface $ContractRepository)
    {
        $this->ContractRepository = $ContractRepository;
    }

    public function index()
    {
        return response()->json($this->ContractRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->ContractRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->ContractRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->ContractRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->ContractRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
