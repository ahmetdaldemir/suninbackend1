<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Language\LanguageRepositoryInterface;
use App\Repositories\Rent\Module\ModuleRepositoryInterface;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    private ModuleRepositoryInterface $moduleRepository;
    private LanguageRepositoryInterface $languageRepository;
    private VillaRepositoryInterface $villaRepository;

    public function __construct(ModuleRepositoryInterface $moduleRepository,VillaRepositoryInterface $villaRepository,LanguageRepositoryInterface $languageRepository)
    {
        $this->moduleRepository = $moduleRepository;
        $this->villaRepository = $villaRepository;
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        $data = $this->moduleRepository->all();
        return view('rent/module/index',$data);
    }

    public function store(Request $request)
    {
        $this->moduleRepository->create($request);
        return redirect()->to('crm/module');
    }

    public function edit(Request $request)
    {
        $data['module'] = $this->moduleRepository->get($request->id);
        $data['languages']  = $this->languageRepository->all();
        $data['villas']  = $this->villaRepository->all();

        $data['content'] = json_decode($data['module']['content']);
        //dd($data['module']);
        return view('rent/module/'.$data['module']['class'],$data);
    }

    public function update(Request $request)
    {
        $this->moduleRepository->update($request);
        return redirect()->to('crm/module');
    }

    public function destroy(Villa $villa)
    {
        $this->moduleRepository->delete($villa->id);
        return redirect()->to('crm/module');
    }
    public function imageSave(Request $request)
    {
        $this->moduleRepository->createImage($request);
        return redirect()->to('villa/images/'.$request->villa_id);
    }
    public function sortSave(Request $request)
    {
        foreach ($request->sort as $key => $sort){
            VillaImage::where('villa_id', $request->villa_id)->where('id', $sort)->update(["sort" => $key]);
        }
        return response()->json(['success' => 'İştem Tamamlandı!'], 200);
    }
    public function mainImage(Request $request)
    {
        //dd($request);
        Villa::where('id',$request->id)->update(['image'=> $request->image]);
        return response()->json(['success' => 'İştem Tamamlandı!'], 200);
    }
}
