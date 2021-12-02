<?php namespace App\Http\Controllers;

 use App\Repositories\View\RentCategory\RentCategoryRepositoryInterface;
 use App\Repositories\View\Blog\BlogRepositoryInterface;
use App\Repositories\View\Category\CategoryRepositoryInterface;
 use App\Repositories\View\RentDestination\RentDestinationRepositoryInterface;
 use App\Repositories\View\Villa\VillaRepositoryInterface;
use App\Repositories\View\Slider\SliderRepositoryInterface;


class MainController extends Controller
{

    private VillaRepositoryInterface $villaRepository;
    private BlogRepositoryInterface $blogRepository;
    private CategoryRepositoryInterface $catgeoryRepository;
    private SliderRepositoryInterface $sliderRepository;
    private RentDestinationRepositoryInterface $rentDestinationRepository;
    private RentCategoryRepositoryInterface $rentCategoryRepository;


    protected $lang_id;

    public function __construct(
        VillaRepositoryInterface $villaRepository,
        BlogRepositoryInterface $blogRepository,
        CategoryRepositoryInterface $catgeoryRepository,
        SliderRepositoryInterface $sliderRepository,
        RentDestinationRepositoryInterface $rentDestinationRepository,
        RentCategoryRepositoryInterface $rentCategoryRepository
    )
    {
        $this->lang_id = '126e6025-6abf-4e4a-851a-d0a372f2f0cc';
        $this->villaRepository = $villaRepository;
        $this->blogRepository = $blogRepository;
        $this->catgeoryRepository = $catgeoryRepository;
        $this->sliderRepository = $sliderRepository;
        $this->rentDestinationRepository = $rentDestinationRepository;
        $this->rentCategoryRepository = $rentCategoryRepository;
    }

    public function index()
    {
        $data['villas'] = $this->villaRepository->all();
        $data['blogs'] = $this->blogRepository->all();
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['sliders'] = $this->sliderRepository->all();
        $data['destinations'] = $this->rentDestinationRepository->all();
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

    public function detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['villa'] = $this->villaRepository->getslug($slug);
        return view('pages/detail',$data);
    }

    public function destination_detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['destination'] = $this->rentDestinationRepository->getslug($slug);
        return view('pages/destination_detail',$data);
    }

    public function category_detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['category'] = $this->rentCategoryRepository->getslug($slug);
        return view('pages/category_detail',$data);
    }

    public function listing()
    {
        return view('pages/list');
    }

    public function add_listing()
    {
        return view('pages/add_listing');
    }


    public function destinations()
    {
        $data['destination'] = $this->destinationRepository->all();
        return view('pages/destinations');
    }

    public function categories()
    {
        $data['categories'] = $this->categoryRepository->all();
        return view('pages/categories');
    }

}