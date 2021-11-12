<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Rent\Villa\VillaRepositoryInterface;
use Illuminate\Http\Request;

class VillaController extends Controller
{

    private VillaRepositoryInterface $villaRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(VillaRepositoryInterface $villaRepository,CategoryRepositoryInterface $categoryRepository)
    {
        $this->villaRepository = $villaRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $data['villa']  = $this->villaRepository->all();
        dd($data);
        return view('rent/villa/index',$data);
    }


    public function create(Request $request)
    {
        $data['category']  = $this->categoryRepository->all();
        return view('rent/villa/create',$data);
    }


    public function store(Request $request)
    {
        return $this->villaRepository->create($request);
        redirect()->back();
    }

    public function edit(Request $request)
    {
        $data['category']  = $this->categoryRepository->all();
        return $this->villaRepository->get($request->id);
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
