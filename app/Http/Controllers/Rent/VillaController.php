<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Destination\DestinationRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\Regulation\RegulationRepositoryInterface;
use App\Repositories\Rent\Tenant\TenantRepositoryInterface;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Services\ICal;
use Illuminate\Http\Request;
use Spatie\IcalendarGenerator\Components\Calendar;

class VillaController extends Controller
{
    private VillaRepositoryInterface $villaRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private LanguageRepositoryInterface $languageRepository;
    private DestinationRepositoryInterface $destinationRepository;
    private PropertyRepositoryInterface $propertyRepository;
    private RegulationRepositoryInterface $regulationRepository;
    private ServiceRepositoryInterface $serviceRepository;
    private TenantRepositoryInterface $tenantRepository;

    public function __construct(VillaRepositoryInterface $villaRepository,
                                CategoryRepositoryInterface $categoryRepository,
                                ServiceRepositoryInterface $serviceRepository,
                                RegulationRepositoryInterface $regulationRepository,
                                PropertyRepositoryInterface $propertyRepository,
                                LanguageRepositoryInterface $languageRepository,
                                DestinationRepositoryInterface $destinationRepository,
                                TenantRepositoryInterface $tenantRepository)
    {
        $this->villaRepository = $villaRepository;
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
        $this->destinationRepository = $destinationRepository;
        $this->regulationRepository = $regulationRepository;
        $this->serviceRepository = $serviceRepository;
        $this->propertyRepository = $propertyRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function index()
    {
        $data['villa'] = $this->villaRepository->all();
        //dd($data);
        //$month_name = array("January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December");
        //$gunlerIng = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $month_name = array("Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran","Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık");
        $gunler = array("Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi", "Pazar");

        $date = date('m');
        for ($i=$date;$i<13;$i++){
            $data['month']['name'] = @$month_name[$i];
            //for
        }
        return view('rent/villa/index',$data);
    }

    public function create()
    {
        $data['languages']  = $this->languageRepository->all();
        $data['destinations']  = $this->destinationRepository->all();
        $data['properties']  = $this->propertyRepository->all();
        $data['regulations']  = $this->regulationRepository->all();
        $data['services']  = $this->serviceRepository->all();
        $data['categories']  = $this->categoryRepository->all();
        $data['tenants']  = $this->tenantRepository->type('landlord');
        return view('rent/villa/create',$data);
    }

    public function store(Request $request)
    {
        return $this->villaRepository->create($request);
        redirect()->back();
    }

    public function edit(Request $request)
    {
        $data['villa'] = $this->villaRepository->get($request->id);
        $data['categories']  = $this->categoryRepository->all();
        $data['languages']  = $this->languageRepository->all();
        $data['destinations']  = $this->destinationRepository->all();
        $data['regulations']  = $this->regulationRepository->all();
        $data['services']  = $this->serviceRepository->all();
        $data['properties']  = $this->propertyRepository->all();
        return view('rent/villa/edit',$data);
    }

    public function images($id)
    {
        $data['villa'] = Villa::find($id);
        return view('rent/villa/images',$data);
    }

    public function update(Request $request, Villa $villa)
    {
        return $this->villaRepository->update($request);
        redirect()->back();
    }
    
    public function destroy(Villa $villa)
    {
        $this->villaRepository->delete($villa->id);
        redirect()->back();
    }

    public function ical()
    {
//        $data = Villa::latest()->first();
//        $x = new ICal($data->code);
//        $ical = $x->create();
//        dd($ical);
        $name = rand(1111,9999);
        $calendar = Calendar::create($name);
        return response($calendar->get(), 200, [
            'Content-Disposition' => 'attachment; filename="'.$name.'.ics"',
            'Content-Type' => 'application/force-download',
            'charset' => 'utf-8',
        ]);
        readfile(''.$name.'.ics');
    }
}
