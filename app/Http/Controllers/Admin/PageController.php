<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Page\PageRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    private PageRepositoryInterface $PageRepository;

    public function __construct(PageRepositoryInterface $PageRepository)
    {
        $this->PageRepository = $PageRepository;
    }

    public function index()
    {
        return response()->json($this->PageRepository->all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        return response()->json($this->PageRepository->create($request),Response::HTTP_CREATED);
    }

    public function show($id)
    {
        return response()->json($this->PageRepository->get($id), Response::HTTP_OK);
     }

    public function update(Request $request)
    {
        return response()->json($this->PageRepository->update($request),Response::HTTP_CREATED);
     }

    public function destroy($id)
    {
        $this->PageRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
