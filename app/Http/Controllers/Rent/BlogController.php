<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
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

    public function index(Request $request)
    {
        $data['update'] = false;
        if($request->id){
            $data['blog'] = $this->blogRepository->get($request->id);
            $data['update'] = true;
        }
        //dd($data['blog']);
        $data['blogs'] = $this->blogRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/blog/index',$data);
    }


    public function create()
    {
        $data['languages']  = $this->languageRepository->all();
        return view('rent/blog/create',$data);
    }


    public function edit(Request $request)
    {
        $data['blogs'] = $this->blogRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/blog/index',$data);
    }

    public function store(Request $request)
    {
        $this->blogRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->blogRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
         $this->blogRepository->update($request);
         return redirect()->back();
    }

    public function destroy($id)
    {
        $this->blogRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
