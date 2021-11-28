<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\RentDestination\RentDestinationRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RentDestinationController extends Controller
{
    private RentDestinationRepositoryInterface $rentDestinationRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(RentDestinationRepositoryInterface $rentDestinationRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->rentDestinationRepository = $rentDestinationRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index(Request $request)
    {
        $data['destinations'] = $this->rentDestinationRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/destination/list',$data);
    }

    public function create()
    {
        $data['languages']  = $this->languageRepository->all();
        return view('rent/destination/create',$data);
    }

    public function edit(Request $request)
    {
        $data['destinations'] = $this->rentDestinationRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/destination/index',$data);
    }

    public function store(Request $request)
    {
        $this->rentDestinationRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->rentDestinationRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        $this->rentDestinationRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->rentDestinationRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
