<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Message\MessageRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    private MessageRepositoryInterface $messagesRepository;

    public function __construct(MessageRepositoryInterface $messagesRepository)
    {
        $this->messagesRepository = $messagesRepository;
    }

    public function index()
    {
        return view('rent/message/index');
    }

    public function create()
    {
        return view('rent/message/create');
    }

    public function store(Request $request)
    {
        $this->messagesRepository->create($request);
        return redirect()->back();
    }

    public function show($id)
    {
        $data['message'] =  $this->messagesRepository->get($id);
        return view('rent/message/show',$data);
    }

    public function update(Request $request)
    {
        $this->messagesRepository->create($request);
        return redirect()->back();
     }

    public function destroy($id)
    {
        $this->messagesRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
}
