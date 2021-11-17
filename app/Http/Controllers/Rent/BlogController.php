<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Blog\BlogRepositoryInterface;
use Illuminate\Http\Request;

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
        return view('rent/blog/index',$data);
    }


    public function create(Request $request)
    {
        $data['languages']  = $this->languageRepository->all();
        //dd($data['regulations']);
        return view('rent/blog/create',$data);
    }


    public function store(Request $request)
    {
        return $this->blogRepository->create($request);
        //redirect()->back();
    }

    public function edit(Request $request)
    {
        return view('rent/blog/edit',$data);
    }


    public function update(Request $request, Blog $blog)
    {
        return $this->blogRepository->update($request);
        redirect()->back();
    }


    public function destroy(Blog $blog)
    {
        $this->blogRepository->delete($blog->id);
        redirect()->back();
    }
}
