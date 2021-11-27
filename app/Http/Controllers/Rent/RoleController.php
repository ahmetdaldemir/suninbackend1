<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    private RoleRepositoryInterface $RoleRepository;

    public function __construct(RoleRepositoryInterface $RoleRepository)
    {
        $this->RoleRepository = $RoleRepository;
    }

    public function index()
    {
        $data['permissions'] = Permission::all();
        return view('rent/user/permission', $data);
    }

    public function store(Request $request)
    {
        $this->RoleRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->RoleRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        $this->RoleRepository->update($request);
        return redirect()->back();
     }

    public function destroy($id)
    {
        $this->RoleRepository->delete($id);
        return redirect()->back();
    }
}
