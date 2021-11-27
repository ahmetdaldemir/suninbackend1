<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Permission\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $data['update'] = false;
        $data['permissions'] = $this->permissionRepository->all();
        return view('rent/user/permission', $data);
    }

    public function store(Request $request)
    {
        $this->permissionRepository->create($request);
        return redirect()->back();
    }

    public function edit($id)
    {
        $data['update'] = true;
        $data['permission'] = $this->permissionRepository->get($id);
        $data['permissions'] = $this->permissionRepository->all();
        return view('rent/user/permission', $data);
     }

    public function update(Request $request)
    {
        $this->permissionRepository->update($request);
        return redirect()->back();
     }

    public function delete($id)
    {
        $this->permissionRepository->delete($id);
        return redirect('permission');
    }
}
