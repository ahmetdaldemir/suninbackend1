<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    private CustomerRepositoryInterface $CustomerRepository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function index()
    {
        return response()->json($this->CustomerRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->CustomerRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->CustomerRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->CustomerRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->CustomerRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
