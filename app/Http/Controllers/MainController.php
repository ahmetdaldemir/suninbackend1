<?php namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Villa;
use App\Models\VillaCategory;
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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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
    public $auth_id = null;
    protected $lang_id;

    public function __construct(
        VillaRepositoryInterface $villaRepository,
        BlogRepositoryInterface $blogRepository,
        CategoryRepositoryInterface $catgeoryRepository,
        SliderRepositoryInterface $sliderRepository,
        RentDestinationRepositoryInterface $rentDestinationRepository,
        RentCategoryRepositoryInterface $rentCategoryRepository,
        PropertyRepositoryInterface $propertyRepository,
        RegulationRepositoryInterface $regulationRepository,
        ServiceRepositoryInterface $serviceRepository,
        RentPageRepositoryInterface $rentPageRepository,
        SettingRepositoryInterface $settingRepository,
        CustomerRepositoryInterface $customerRepository,
        ReservationRepositoryInterface $reservationRepository
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
        if(!empty(Auth::guard('web-user')->id())){
            //dd(Auth::guard('web-user')->id());
            $data['auth_id'] = Auth::guard('web-user')->id();
        }else{
            $data['auth_id'] = null;
        }
        $data['villas'] = $this->villaRepository->all();
        //dd($data['villas']);
        $data['blogs'] = $this->blogRepository->all();
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['sliders'] = $this->sliderRepository->all();
        $data['destinations'] = $this->rentDestinationRepository->all();
        // dd($data['destinations']);
        return view('welcome', $data);
    }

    public function contact()
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['setting'] = $this->settingRepository->all();
        $data['lang_id'] = $this->lang_id;
        return view('pages/contact', $data);
    }

    public function blog()
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['blogs'] = $this->blogRepository->all();
        return view('pages/blog', $data);
    }

    public function about($slug)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['page'] = $this->rentPageRepository->getslug($slug);
        return view('pages/about', $data);
    }

    public function detail($slug)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['properties'] = $this->propertyRepository->all();
        $data['regulations'] = $this->regulationRepository->all();
        $data['services'] = $this->serviceRepository->all();
        $data['villa'] = $this->villaRepository->getslug($slug);

        foreach ($data['villa']['propertys'] as $property) {
            $data['villa_property'][] = $property['property_id'];
        }
        foreach ($data['villa']['regulations'] as $regulation) {
            $data['villa_regulation'][] = $regulation['regulation_id'];
        }
        foreach ($data['villa']['services'] as $service) {
            $data['villa_service'][] = $service['service_id'];
        }
        return view('pages/detail', $data);
    }

    public function destination_detail($slug)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['destination'] = $this->rentDestinationRepository->getslug($slug);
        return view('pages/destination_detail', $data);
    }

    public function category_detail($slug)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['category'] = $this->rentCategoryRepository->getslug($slug);
        return view('pages/category_detail', $data);
    }

    public function category($slug)
    {
        $data['lang_id'] = $this->lang_id;
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['category'] = $this->rentCategoryRepository->getslug($slug);
        $data['villas'] = $this->villaRepository->select($data['category']['rentcategory']['id']);
        //dd($data['villas']);
        return view('pages/categories', $data);
    }

    public function destination()
    {
        $data['categories'] = $this->rentCategoryRepository->all();
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
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['blog'] = $this->blogRepository->getslug($slug);
        return view('pages/blog_detail', $data);
    }

    public function listing(Request $request)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $this->search($request);
        $data['category_id'] = $request->category;
        $data['lang_id'] = $this->lang_id;
        $data['checkin'] = $request->checkin;
        $data['checkin'] = implode("-", array_reverse(explode("/", $request->checkin)));
        $data['checkout'] = implode("-", array_reverse(explode("/", $request->checkout)));
        $data['adult'] = $request->adult;
        $data['categories'] = $this->rentCategoryRepository->getVilla($data);
        //dd($data['categories']);

        $data['villas'] = $this->villaRepository->search($data);
        //dd($data);
        return view('pages/list', $data);
    }

    public function all_villa(Request $request)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['category_id'] = $request->category;
        $data['lang_id'] = $this->lang_id;
        $data['categories'] = $this->rentCategoryRepository->getVilla($data);
        $data['villas'] = $this->villaRepository->all();
        return view('pages/list', $data);
    }

    public function all_blogs(Request $request)
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        $data['blogs'] = $this->blogRepository->all();
        return view('pages/blog', $data);
    }


    public function search(Request $request)
    {
        $id1 = [];
        $id2 = [];
        $id3 = [];
        Villa::all();
        $category = $request->category ? $request->category:0;
        $adult = $request->adult ? $request->adult:2;
        $checkin = $request->checkin ? $request->checkin:date("Y-m-d");
        $checkout = $request->checkout ? $request->checkout:date("Y-m-d");

        $villa1 = VillaCategory::select('villa_id')->where('category_id', $category)->get();
        foreach($villa1 as $item)
        {
            $id1[] = $item->villa_id;
        }
        $villa2 = Villa::select('id as villa_id')->where('capacity', '>=', $adult)->get();
        foreach($villa2 as $item)
        {
            $id2[] = $item->villa_id;
        }
        $villa3 = Reservation::select('villa_id')->where('checkin', '<=', $checkout)->where('checkout', '>=', $checkin)->get()->toArray();
        foreach($villa3 as $item)
        {
            $id3[] = @$item->villa_id;
        }
        $new_villa = array_intersect($id1, $id2);
        $new_villa_diff = array_diff($new_villa, $id3);
        $request = Villa::whereIn('id', $new_villa_diff)->get();
        return $request;
    }

    public function add_listing()
    {
        return view('pages/add_listing');
    }

    public function login()
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;

        return view('pages/login',$data);
    }

    public function register()
    {
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;

        return view('pages/register',$data);
    }

    public function loginaction(Request $request)
    {
        $data = $this->customerRepository->login($request);
        return redirect()->to('/');
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
        //dd($request);
        Cache::flush();
        Cache::add('data.checkin', $request->checkin);
        Cache::add('data.checkout', $request->checkout);
        Cache::add('data.guest', $request->guest);
        Cache::add('data.villa_id', $request->villa_id);

        $data = $this->reservationRepository->check($request);
        if (Count($data) == 0) {
            return response()->json(['url' => url('reservation/detail')], 200);
        } else {
            return response()->json(['warning' => true], 200);
        }
    }

    public function villaCalculate(Request $request)
    {
        return  $this->reservationRepository->calculate($request);
    }



    public function favorite(Request $request)
    {
        $result = $this->villaRepository->fav($request);
        return response()->json(['confirm' => $result], 200);
    }

    public function like(Request $request)
    {
        $result = $this->villaRepository->like($request);
        return response()->json(['confirm' => true,'count' => $result], 200);
    }

    public function reservationDetail(Request $request)
    {
        //dd($request);
        //dd(Cache::get('data.guest'));
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['percent'] = null;
        $data['lang_id'] = $this->lang_id;
        $data['checkin'] = Cache::get('data.checkin');
        $data['checkout'] = Cache::get('data.checkout');
        $data['guest'] = Cache::get('data.guest');
        $villa_id = Cache::get('data.villa_id');
        $fark = Carbon::parse(implode('-',array_reverse(explode('/',$data['checkin']))));
        $data['day'] = $fark->diffInDays(implode('-',array_reverse(explode('/',$data['checkout']))));
        $data['villa'] = $this->villaRepository->get($villa_id);

        $data['price_day'] = $data['villa']['price'];
        $data['deposit'] = $data['villa']['deposit'];
        $data['currency'] = $data['villa']['currency_id'];
        $data['cleaning'] = $data['villa']['villa']->cleaning;
        $data['price'] = intval($data['villa']['price']) * $data['day'];
        /*Discount*/
        if ($data['villa']['discount_type']=='static'){
            $data['discount'] = $data['villa']['discount'];
        }else{
            $data['percent'] = $data['villa']['discount'];
            $data['discount'] = ($data['villa']['price']*$data['day'])/100*$data['villa']['discount'];
        }

        /*Total & PrePaid*/
        if ($data['villa']['discount']==0) {
            $data['prepaid']     =  ($data['villa']['price'] * $data['day'] + $data['villa']['villa']->cleaning) / 100 * $data['villa']['deposit'];
            $data['total_price'] =  ($data['villa']['price'] * $data['day'] + $data['villa']['villa']->cleaning);
        }else{
            $data['prepaid'] =      ($data['villa']['price'] * $data['day'] + $data['villa']['villa']->cleaning - $data['discount']) / 100 * $data['villa']['deposit'];
            $data['total_price'] =  ($data['villa']['price'] * $data['day'] + $data['villa']['villa']->cleaning - $data['discount']);
        }
        $json = Storage::disk('local')->get('country.json');
        $data['country'] = json_decode($json, true);

        Cache::add('data.day', $data['day']);
        Cache::add('data.price_day', $data['price_day']);
        Cache::add('data.discount', $data['discount']);
        Cache::add('data.deposit', $data['deposit']);
        Cache::add('data.cleaning', $data['cleaning']);
        Cache::add('data.total_price', $data['total_price']);

        return view('pages/reservationdetail',$data);
    }

    public function reservationAction(Request $data)
    {
        $data['price_day'] = Cache::get('data.price_day');
        $data['total_price'] = Cache::get('data.total_price');
        $data['checkin'] = Cache::get('data.checkin');
        $data['checkout'] = Cache::get('data.checkout');
        $data['guest'] = Cache::get('data.guest');
        $data['day'] = Cache::get('data.day');
        $data['deposit'] = Cache::get('data.deposit');
        $data['cleaning'] = Cache::get('data.cleaning');
        $data['discount'] = Cache::get('data.discount');
        $data['status_id'] = '4464d45e-52a2-11ec-bf63-0242ac130002';
        $data['currency_id'] = '13f5bcab-99b4-4582-9dcc-42e14c634a97';
        $payment_id = $this->reservationRepository->create($data);
        return redirect()->to('reservation/payment/'.$payment_id);
    }

    public function reservationPayment($reservation_id)
    {
        $data = $this->reservationRepository->get($reservation_id);
        $data['villa'] = $this->villaRepository->get($data->villa_id);
        $data['lang_id'] = $this->lang_id;
        $data['categories'] = $this->rentCategoryRepository->all();
        return view('pages/reservationpayment',$data);
    }

    public function account()
    {
        $data["account"] = Auth::guard("web-user")->user();
        $data['categories'] = $this->rentCategoryRepository->all();
        $data['lang_id'] = $this->lang_id;
        return view("pages/account/index",$data);
    }
}
