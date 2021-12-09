<?php namespace App\Http\Controllers;

use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\Regulation\RegulationRepositoryInterface;
use App\Repositories\Rent\Page\RentPageRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\View\Customer\CustomerRepositoryInterface;
use App\Repositories\View\RentCategory\RentCategoryRepositoryInterface;
use App\Repositories\View\Blog\BlogRepositoryInterface;
use App\Repositories\View\Category\CategoryRepositoryInterface;
use App\Repositories\View\RentDestination\RentDestinationRepositoryInterface;
use App\Repositories\View\Reservation\ReservationRepositoryInterface;
use App\Repositories\View\Setting\SettingRepositoryInterface;
use App\Repositories\View\Villa\VillaRepositoryInterface;
use App\Repositories\View\Slider\SliderRepositoryInterface;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private VillaRepositoryInterface $villaRepository;
    private BlogRepositoryInterface $blogRepository;
    private CategoryRepositoryInterface $catgeoryRepository;
    private SliderRepositoryInterface $sliderRepository;
    private RentDestinationRepositoryInterface $rentDestinationRepository;
    private RentCategoryRepositoryInterface $rentCategoryRepository;
    private PropertyRepositoryInterface $propertyRepository;
    private RegulationRepositoryInterface $regulationRepository;
    private ServiceRepositoryInterface $serviceRepository;
    private RentPageRepositoryInterface $rentPageRepository;
    private SettingRepositoryInterface $settingRepository;
    private CustomerRepositoryInterface $customerRepository;
    private ReservationRepositoryInterface $reservationRepository;

    protected $lang_id;

    public function __construct(
        VillaRepositoryInterface           $villaRepository,
        BlogRepositoryInterface            $blogRepository,
        CategoryRepositoryInterface        $catgeoryRepository,
        SliderRepositoryInterface          $sliderRepository,
        RentDestinationRepositoryInterface $rentDestinationRepository,
        RentCategoryRepositoryInterface    $rentCategoryRepository,
        PropertyRepositoryInterface        $propertyRepository,
        RegulationRepositoryInterface      $regulationRepository,
        ServiceRepositoryInterface         $serviceRepository,
        RentPageRepositoryInterface        $rentPageRepository,
        SettingRepositoryInterface         $settingRepository,
        CustomerRepositoryInterface        $customerRepository,
        ReservationRepositoryInterface     $reservationRepository
    )
    {
        $this->lang_id = '126e6025-6abf-4e4a-851a-d0a372f2f0cc';
        $this->villaRepository = $villaRepository;
        $this->blogRepository = $blogRepository;
        $this->catgeoryRepository = $catgeoryRepository;
        $this->sliderRepository = $sliderRepository;
        $this->rentDestinationRepository = $rentDestinationRepository;
        $this->rentCategoryRepository = $rentCategoryRepository;
        $this->propertyRepository = $propertyRepository;
        $this->regulationRepository = $regulationRepository;
        $this->serviceRepository = $serviceRepository;
        $this->rentPageRepository = $rentPageRepository;
        $this->settingRepository = $settingRepository;
        $this->customerRepository = $customerRepository;
        $this->reservationRepository = $reservationRepository;
    }

    public function index()
    {
        $data['villas'] = $this->villaRepository->all();
        $data['blogs'] = $this->blogRepository->all();
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['sliders'] = $this->sliderRepository->all();
        $data['destinations'] = $this->rentDestinationRepository->all();
        //dd($data['destinations']);
        return view('welcome', $data);
    }

    public function contact()
    {
        $data['setting'] = $this->settingRepository->all();
        return view('pages/contact', $data);
    }

    public function blog()
    {
        $data['lang_id'] = $this->lang_id;
        $data['blogs'] = $this->blogRepository->all();
        return view('pages/blog', $data);
    }

    public function about($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['page'] = $this->rentPageRepository->getslug($slug);
        return view('pages/about', $data);
    }

    public function detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['properties'] = $this->propertyRepository->all();
        $data['regulations'] = $this->regulationRepository->all();
        $data['services'] = $this->serviceRepository->all();
        $data['villa'] = $this->villaRepository->getslug($slug);
        //dd($data['villa']['propertys']);
        foreach ($data['villa']['propertys'] as $property) {
            $data['villa_property'][] = $property['property_id'];
        }
        foreach ($data['villa']['regulations'] as $regulation) {
            $data['villa_regulation'][] = $regulation['regulation_id'];
        }
        foreach ($data['villa']['services'] as $service) {
            $data['villa_service'][] = $service['service_id'];
        }
        //dd($data);
        return view('pages/detail', $data);
    }

    public function destination_detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['destination'] = $this->rentDestinationRepository->getslug($slug);
        return view('pages/destination_detail', $data);
    }

    public function category_detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['category'] = $this->rentCategoryRepository->getslug($slug);
        return view('pages/category_detail', $data);
    }

    public function category()
    {
        $data['lang_id'] = $this->lang_id;
        $data['categories'] = $this->rentCategoryRepository->all();
        return view('pages/categories', $data);
    }

    public function destination()
    {
        $data['lang_id'] = $this->lang_id;
        $data['destinations'] = $this->rentDestinationRepository->all();
        return view('pages/destinations', $data);
    }

    public function autoDestination(Request $request)
    {
        $data['lang_id'] = $this->lang_id;
        $data['destinations'] = $this->rentDestinationRepository->search($request);
        return response()->json(['query' => $data], 200);
    }

    public function blog_detail($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['blog'] = $this->blogRepository->getslug($slug);
        return view('pages/blog_detail', $data);
    }

    public function listing(Request $request)
    {
        $data['lang_id'] = $this->lang_id;
        $data['villas'] = $this->villaRepository->all();
        return view('pages/list',$data);
    }

    public function add_listing()
    {
        return view('pages/add_listing');
    }

    public function login()
    {
        return view('pages/login');
    }

    public function register()
    {
        return view('pages/register');
    }

    public function loginaction(Request $request)
    {
        $data = $this->customerRepository->login($request);
        dd($data);
        return redirect()->to('index');
    }

    public function registeraction(Request $request)
    {
        $this->customerRepository->create($request);
        return redirect()->to('login');
    }

    public function logout(Request $request)
    {
        $this->customerRepository->logout($request);
        return redirect()->to('login');
    }

    public function villaCheck(Request $request)
    {
        $data = $this->reservationRepository->check($request);
        if(Count($data)==0){
            return response()->json(['url' => url('reservation/detail/'.$request->villa_id)], 200);
        }else{
            return response()->json(['warning' => true], 200);
        }
    }

    public function reservationDetail($villa_id){
        return view('pages/reservationdetail');
    }
}