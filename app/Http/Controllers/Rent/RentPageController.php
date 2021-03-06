<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Page\RentPageRepositoryInterface;
use Illuminate\Http\Request;

class RentPageController extends Controller
{
    private RentPageRepositoryInterface $RentPageRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(RentPageRepositoryInterface $RentPageRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->RentPageRepository = $RentPageRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        $data = $this->RentPageRepository->all();
        return view('rent/pages/list',$data);
    }

    public function store(Request $request)
    {
        $this->RentPageRepository->create($request);
        return redirect()->to('crm/page');
    }

    public function edit(Request $request)
    {
        $data['page'] = $this->RentPageRepository->get($request->id);
        $data['main_page']['name'] = ' ';//@$this->RentPageRepository->get($data['page']['page_id']);
        $data['languages']  = $this->languageRepository->all();

        return view('rent/pages/edit',$data);
    }

    public function update(Request $request)
    {
        $this->RentPageRepository->update($request);
        return redirect()->to('crm/page');
     }

    public function destroy($id)
    {
        $this->RentPageRepository->delete($id);
        return redirect()->to('crm/page');
    }
}
