<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Destination\DestinationRepositoryInterface;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Property\PropertyRepositoryInterface;
use App\Repositories\Regulation\RegulationRepositoryInterface;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;
use Illuminate\Http\Request;

class VillaController extends Controller
{

    private VillaRepositoryInterface $villaRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private LanguageRepositoryInterface $languageRepository;
    private DestinationRepositoryInterface $destinationRepository;
    private PropertyRepositoryInterface $propertyRepository;
    private RegulationRepositoryInterface $regulationRepository;
    private ServiceRepositoryInterface $serviceRepository;

    public function __construct(VillaRepositoryInterface $villaRepository,CategoryRepositoryInterface $categoryRepository,ServiceRepositoryInterface $serviceRepository,RegulationRepositoryInterface $regulationRepository,PropertyRepositoryInterface $propertyRepository,LanguageRepositoryInterface $languageRepository,DestinationRepositoryInterface $destinationRepository)
    {
        $this->villaRepository = $villaRepository;
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
        $this->destinationRepository = $destinationRepository;
        $this->regulationRepository = $regulationRepository;
        $this->serviceRepository = $serviceRepository;
        $this->propertyRepository = $propertyRepository;
    }

    public function index()
    {
        $data['villa'] = $this->villaRepository->all();
        //dd($data);
        return view('rent/villa/index',$data);
    }


    public function create(Request $request)
    {
        $data['languages']  = $this->languageRepository->all();
        $data['destinations']  = $this->destinationRepository->all();
        $data['properties']  = $this->propertyRepository->all();
        $data['regulations']  = $this->regulationRepository->all();
        $data['services']  = $this->serviceRepository->all();
        $data['categories']  = $this->categoryRepository->all();
        //dd($data);
        return view('rent/villa/create',$data);
    }


    public function store(Request $request)
    {
        return $this->villaRepository->create($request);
        //redirect()->back();
    }

    public function edit(Request $request)
    {
        $data['category']  = $this->categoryRepository->all();
        //return $this->villaRepository->get($request->id);
        return view('rent/villa/edit',$data);
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
}
