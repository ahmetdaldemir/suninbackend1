<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Contract\ContractRepositoryInterface;
use App\Repositories\Rent\Currency\CurrencyRepositoryInterface;
use App\Repositories\Rent\User\UserRepositoryInterface;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    private UserRepositoryInterface $userRepository;
    private VillaRepositoryInterface $villaRepository;
    private ContractRepositoryInterface $contractRepository;
    private CurrencyRepositoryInterface $currencyRepository;

    public function __construct(ContractRepositoryInterface $contractRepository,CurrencyRepositoryInterface $currencyRepository,UserRepositoryInterface $userRepository, VillaRepositoryInterface $villaRepository)
    {
        $this->contractRepository = $contractRepository;
        $this->userRepository = $userRepository;
        $this->villaRepository = $villaRepository;
        $this->currencyRepository = $currencyRepository;
    }

    public function index(Request $request)
    {
        $data['villa'] = $this->villaRepository->get($request->id);
        $data['contracts'] = $this->contractRepository->get($request->id);
        $data['currency'] = $this->currencyRepository->all();
        return view('rent/contracts/index',$data);
    }

    public function create(Request $request)
    {
        $this->contractRepository->create($request);
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
