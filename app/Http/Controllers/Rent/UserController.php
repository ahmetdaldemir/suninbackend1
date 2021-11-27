<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Rent\Permission\PermissionRepositoryInterface;
use App\Repositories\Rent\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(UserRepositoryInterface $userRepository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->userRepository = $userRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function index(Request $request)
    {
        $data['update'] = false;
        if ($request->id) {
            $data['user'] = $this->userRepository->get($request->id);
            $data['update'] = true;
        }
        $data['users'] = $this->userRepository->all();
        return view('rent/user/index', $data);
    }


    public function roles($id)
    {
        $data['update'] = false;
        $data['user'] = $this->userRepository->get($id);
        $data['permissions'] = $this->permissionRepository->all();
        return view('rent/user/roles', $data);
    }


    public function create()
    {
        $data['languages'] = $this->languageRepository->all();
        return view('rent/blog/create', $data);
    }

    public function rolesadd(Request $request)
    {
       $user = $this->userRepository->get($request->user_id);
       $role = Role::find($user['role_id']);
       foreach ($request->permissions as $permission)
       {
           $role->givePermissionTo($permission);
       }
       return redirect()->back();
    }

    public function edit(Request $request)
    {
        $data['user'] = $this->userRepository->all();
        return view('rent/blog/index', $data);
    }

    public function store(Request $request)
    {
        $this->userRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->userRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        $this->userRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);
        response()->json("Başarılı", Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
