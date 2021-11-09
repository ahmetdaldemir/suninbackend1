<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Repositories\Language\LanguageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    private LanguageRepositoryInterface $languageRepository;

    public function __construct(LanguageRepositoryInterface $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function index()
    {
        return response()->json($this->languageRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->languageRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->languageRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        return response()->json($this->languageRepository->update($request),Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $this->languageRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
    }

    public function flags()
    {
        $flags = DB::table('flags')->get();
        return response()->json([$flags], 200);
    }

    public function setDefault($id)
    {

        $updateAll = DB::table('languages')->update(['status' => false]);

        $language = new Language();
        $language->where('id','=',$id)->update(['status' => true]);

        return response()->json(['status' => 'OK',200]);
    }
}
