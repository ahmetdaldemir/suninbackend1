<?php namespace App\Http\Controllers;

use App\Repositories\View\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;

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
}