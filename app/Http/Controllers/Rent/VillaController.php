<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use App\Repositories\Villa\VillaRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VillaController extends Controller
{

    private VillaRepositoryInterface $villaRepository;

    public function __construct(VillaRepositoryInterface $villaRepository)
    {
        $this->villaRepository = $villaRepository;
    }

    public function index()
    {
        $data['villa']  = $this->villaRepository->all();
        return view('rent/villa/index',$data);
    }


    public function create(Request $request)
    {
        return view('rent/villa/create');
    }


    public function store(Request $request)
    {
        return $this->villaRepository->create($request);
        redirect()->back();
    }




    public function edit(Request $request)
    {
        return $this->villaRepository->get($request->id);
        return view('rent/villa/edit');
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
