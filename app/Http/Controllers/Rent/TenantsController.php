<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Customer\CustomerRepositoryInterface;
use App\Repositories\Rent\Tenant\TenantRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenantsController extends Controller
{
    private CustomerRepositoryInterface $CustomerRepository;
    private TenantRepositoryInterface $tenantRepository;

    public function __construct(CustomerRepositoryInterface $CustomerRepository,TenantRepositoryInterface $tenantRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function index()
    {
        $data['tenants'] = $this->tenantRepository->all();
        return view('rent/tenants/index',$data);
    }

    public function store(Request $request)
    {
        $request->type = 'landlord';
        $this->tenantRepository->create($request);
        return redirect()->to('tenants');
    }

    public function create()
    {
        return view('rent/tenants/create');
    }

    public function show($id)
    {
        return response()->json($this->tenantRepository->get($id), Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $request->type = 'landlord';
        $this->tenantRepository->update($request);
        return redirect()->to('tenants');
    }

    public function edit(Request $request)
    {
        $data['tenant'] = $this->tenantRepository->get($request->id);
        return view('rent/tenants/edit',$data);
    }

    public function destroy($id)
    {
        $this->tenantRepository->delete($id);
        return redirect()->to('tenants');
    }
}
