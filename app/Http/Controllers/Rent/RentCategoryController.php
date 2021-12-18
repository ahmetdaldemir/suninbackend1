<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\RentCategory\RentCategoryRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RentCategoryController extends Controller
{
    private RentCategoryRepositoryInterface $rentCategoryRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(RentCategoryRepositoryInterface $rentCategoryRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->rentCategoryRepository = $rentCategoryRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/category/list',$data);
    }

    public function store(Request $request)
    {
        $this->rentCategoryRepository->create($request);
        return redirect()->to('crm/category');
    }

    public function edit(Request $request)
    {
        $data['category'] = $this->rentCategoryRepository->get($request->id);
        //$data['main_name'] = $this->rentCategoryRepository->get($data['category']['category_id']);
        $data['main_name']['title'] = '';//
        $data['languages']  = $this->languageRepository->all();
        return view('rent/category/edit',$data);
    }

    public function update(Request $request)
    {
        $this->rentCategoryRepository->update($request);
        return redirect()->to('crm/category');
    }

    public function destroy($id)
    {
        $this->rentCategoryRepository->delete($id);
        return redirect()->to('crm/category');
    }
}
