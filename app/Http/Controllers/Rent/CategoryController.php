<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        $data['categories'] = $this->categoryRepository->all();
        //dd($data);
        //dd($data['categories'][0]['lang'][0]['title']);
        return view('rent/category/index', $data);
    }

    public function store(Request $request)
    {
        $this->categoryRepository->create($request);
        return redirect()->to('category');
    }

    public function create()
    {
        $data['categories'] = array();
        $data['languages']  = $this->languageRepository->all();
        $data['categories'] = $this->categoryRepository->all();
        return view('rent/category/indexcreate', $data);
    }

    public function show($id)
    {
        return response()->json($this->categoryRepository->get($id), Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $this->categoryRepository->update($request);
        return redirect()->to('category');
    }

    public function edit(Request $request)
    {
        $data['categories'] = $this->categoryRepository->all();
        $data['result'] = $this->categoryRepository->get($request->id);
        return view('rent/category/indexedit', $data);
    }

    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->to('category');
    }
}
