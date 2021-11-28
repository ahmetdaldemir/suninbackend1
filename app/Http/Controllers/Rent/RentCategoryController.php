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

    public function index(Request $request)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/category/list',$data);
    }

    public function create()
    {
        $data['languages']  = $this->languageRepository->all();
        return view('rent/category/create',$data);
    }

    public function edit(Request $request)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/category/index',$data);
    }

    public function store(Request $request)
    {
        $this->rentCategoryRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->rentCategoryRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        $this->rentCategoryRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->rentCategoryRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
