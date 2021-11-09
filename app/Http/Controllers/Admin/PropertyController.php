<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Property\PropertyRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    private PropertyRepositoryInterface $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function index()
    {
        return response()->json($this->propertyRepository->all(), 200);
    }

    public function store(Request $request)
    {
        return response()->json($this->propertyRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->propertyRepository->get($id), Response::HTTP_CONTINUE);
     }

    public function update(Request $request)
    {
        return response()->json($this->propertyRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->propertyRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
    }
}
