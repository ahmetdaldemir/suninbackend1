<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Page\PageRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    private PageRepositoryInterface $pageRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(PageRepositoryInterface $pageRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index(Request $request)
    {
        $data['pages'] = $this->pageRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/pages/list',$data);
    }

    public function create()
    {
        $data['languages']  = $this->languageRepository->all();
        return view('rent/pages/create',$data);
    }

    public function edit(Request $request)
    {
        $data['pages'] = $this->pageRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/pages/index',$data);
    }

    public function store(Request $request)
    {
        $this->pageRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->pageRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        $this->pageRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->pageRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
