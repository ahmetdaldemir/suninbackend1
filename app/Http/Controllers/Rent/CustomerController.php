<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Customer\CustomerRepositoryInterface;
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
        $data['customers'] = $this->CustomerRepository->all();
        return view('rent/customers/index',$data);
    }

    public function store(Request $request)
    {
        $this->CustomerRepository->create($request);
        return redirect()->to('customers');
    }

    public function create()
    {
        return view('rent/customers/create');
    }

    public function show($id)
    {
        return response()->json($this->CustomerRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        $this->CustomerRepository->update($request);
        return redirect()->to('customers');
    }

    public function edit(Request $request)
    {
        $data['customer'] = $this->CustomerRepository->get($request->id);
        return view('rent/customers/edit',$data);
    }

    public function destroy($id)
    {
        $this->CustomerRepository->delete($id);
        return redirect()->to('customers');
    }
}
