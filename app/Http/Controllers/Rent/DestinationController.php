<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Repositories\Destination\DestinationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DestinationController extends Controller
{
    private DestinationRepositoryInterface $destinationRepository;

    public function __construct(DestinationRepositoryInterface $destinationRepository)
    {
        $this->destinationRepository = $destinationRepository;
    }

    public function index()
    {
        $data['destinations'] = $this->destinationRepository->all();
        return view('rent/destination/index',$data);
    }

    public function store(Request $request)
    {
        $this->destinationRepository->create($request);
        return redirect()->to('destination');
    }

    public function create()
    {
        $data['destinations'] = array();
        $data['destinations'] = $this->destinationRepository->all();
        return view('rent/destination/indexcreate',$data);
    }

    public function show($id)
    {
        return response()->json($this->destinationRepository->get($id), Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        $this->destinationRepository->update($request);
        return redirect()->to('destination');
    }

    public function edit(Request $request)
    {
        $data['destinations']  = $this->destinationRepository->all();
        $data['result'] = $this->destinationRepository->get($request->id);
        return view('rent/destination/indexedit',$data);
    }

    public function destroy($id)
    {
        $this->destinationRepository->delete($id);
        return redirect()->to('destination');
    }
}
