<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Currency\CurrencyRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    private CurrencyRepositoryInterface $CurrencyRepository;

    public function __construct(CurrencyRepositoryInterface $CurrencyRepository)
    {
        $this->CurrencyRepository = $CurrencyRepository;
    }

    public function index()
    {
        return response()->json($this->CurrencyRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->CurrencyRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->CurrencyRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->CurrencyRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->CurrencyRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
