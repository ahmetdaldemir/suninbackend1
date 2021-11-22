<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Currency\CurrencyRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyController extends Controller
{
    private CurrencyRepositoryInterface $currencyRepository;

    public function __construct(CurrencyRepositoryInterface $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function index(Request $request)
    {
        $data['update'] = false;
        if($request->id){
            $data['currency'] = $this->currencyRepository->get($request->id);
            $data['update'] = true;
        }
        $data['currencies'] = $this->currencyRepository->all();
        //dd($data['currencies']);
        return view('rent/currency/index',$data);
    }

    public function edit(Request $request)
    {
        $data['currencies'] = $this->currencyRepository->all();
        return view('rent/currency/index',$data);
    }

    public function store(Request $request)
    {
        $this->currencyRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        return response()->json($this->currencyRepository->get($id), Response::HTTP_CONTINUE);
    }

    public function update(Request $request)
    {
        $this->currencyRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->currencyRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
