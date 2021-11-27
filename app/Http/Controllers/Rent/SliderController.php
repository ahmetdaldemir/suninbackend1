<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Slider\SliderRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    private SliderRepositoryInterface $sliderRepository;
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(SliderRepositoryInterface $sliderRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->sliderRepository = $sliderRepository;
        $this->languageRepository = $languageRepository;

        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data['update'] = false;
        if($request->id){
            $data['slider'] = $this->sliderRepository->get($request->id);
            $data['update'] = true;
        }
        //dd($data['blog']);
        $data['sliders'] = $this->sliderRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/slider/index',$data);
    }

    public function edit(Request $request)
    {
        $data['sliders'] = $this->sliderRepository->all();
        $data['languages']  = $this->languageRepository->all();
        return view('rent/slider/index',$data);
    }

    public function store(Request $request)
    {
        $this->sliderRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->sliderRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        $this->sliderRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->sliderRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
