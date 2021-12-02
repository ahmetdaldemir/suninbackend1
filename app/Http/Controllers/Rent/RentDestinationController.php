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

    public function index()
    {
        $data = $this->rentDestinationRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/destination/list',$data);
    }

    public function store(Request $request)
    {
        $this->rentDestinationRepository->create($request);
        return redirect()->to('crm/destination');
    }

    public function edit(Request $request)
    {
        $data['destination'] = $this->rentDestinationRepository->get($request->id);
        //$data['main_name'] = $this->rentDestinationRepository->get($data['destination']['destination_id']);
        $data['main_name']['title'] = '';//
        $data['languages']  = $this->languageRepository->all();
        return view('rent/destination/edit',$data);
    }

    public function update(Request $request)
    {
        $this->rentDestinationRepository->update($request);
        return redirect()->to('crm/destination');
    }

    public function destroy($id)
    {
        $this->rentDestinationRepository->delete($id);
        return redirect()->to('crm/destination');
    }
}
