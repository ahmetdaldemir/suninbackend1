<?php namespace App\Http\Controllers;

use App\Repositories\View\Blog\BlogRepositoryInterface;
use App\Repositories\View\Villa\VillaRepositoryInterface;

class MainController extends Controller
{

    private VillaRepositoryInterface $villaRepository;
    private BlogRepositoryInterface $blogRepository;


    protected $lang_id;

    public function __construct(
        VillaRepositoryInterface $villaRepository,
        BlogRepositoryInterface $blogRepository
    )
    {
        $this->lang_id = '126e6025-6abf-4e4a-851a-d0a372f2f0cc';
        $this->villaRepository = $villaRepository;
        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $data['villas'] = $this->villaRepository->all();
        $data['blogs'] = $this->blogRepository->all();
        $data['lang_id'] = $this->lang_id;
        return view('welcome',$data);
    }


    public function contact()
    {

        return view('pages/contact');
    }

    public function blog()
    {
        return view('pages/blog');
    }

    public function about()
    {
        return view('pages/static');
    }

    public function detail()
    {
        return view('pages/detail');
    }

    public function listing()
    {
        return view('pages/list');
    }

    public function add_listing()
    {
        return view('pages/add_listing');
    }

}