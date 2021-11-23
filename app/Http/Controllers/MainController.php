<?php namespace App\Http\Controllers;

use App\Repositories\View\Blog\BlogRepositoryInterface;
use App\Repositories\View\Category\CategoryRepositoryInterface;
use App\Repositories\View\Villa\VillaRepositoryInterface;
use App\Repositories\View\Slider\SliderRepositoryInterface;


class MainController extends Controller
{

    private VillaRepositoryInterface $villaRepository;
    private BlogRepositoryInterface $blogRepository;
    private CategoryRepositoryInterface $catgeoryRepository;
    private SliderRepositoryInterface $sliderRepository;


    protected $lang_id;

    public function __construct(
        VillaRepositoryInterface $villaRepository,
        BlogRepositoryInterface $blogRepository,
        CategoryRepositoryInterface $catgeoryRepository,
        SliderRepositoryInterface $sliderRepository
    )
    {
        $this->lang_id = '126e6025-6abf-4e4a-851a-d0a372f2f0cc';
        $this->villaRepository = $villaRepository;
        $this->blogRepository = $blogRepository;
        $this->catgeoryRepository = $catgeoryRepository;
        $this->sliderRepository = $sliderRepository;
    }

    public function index()
    {
        $data['villas'] = $this->villaRepository->all();
        $data['blogs'] = $this->blogRepository->all();
        $data['categories'] = $this->catgeoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['sliders'] = $this->sliderRepository->all();
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