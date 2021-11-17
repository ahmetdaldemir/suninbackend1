<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    private BlogRepositoryInterface $blogRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(BlogRepositoryInterface $blogRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        $data['blog'] = $this->blogRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/blog/index',$data);
    }


    public function create(Request $request)
    {
        $data['languages']  = $this->languageRepository->all();
        return view('rent/blog/create',$data);
    }


    public function edit(Request $request)
    {
        $data['blog'] = $this->store($request->id);
        $data['languages']  = $this->languageRepository->all();
        return view('rent/blog/create',$data);
    }

    public function store(Request $request)
    {
        return response()->json($this->blogRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->blogRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
         response()->json($this->blogRepository->update($request),Response::HTTP_CREATED);
         return redirect()->back();
    }

    public function destroy($id)
    {
        $this->blogRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
