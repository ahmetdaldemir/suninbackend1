<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
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

    public function create()
    {
        $data['languages'] = $this->languageRepository->all();
        return view('rent/blog/create', $data);
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
