<?php namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Message\MessageRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    private MessageRepositoryInterface $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function index()
    {
        $data['messages'] = $this->messageRepository->all();
        return view('rent/message/index',$data);
    }

    public function create()
    {
        return view('rent/message/create');
    }

    public function store(Request $request)
    {
        $this->messageRepository->create($request);
    }

    public function show($id)
    {
        $data =  $this->messageRepository->get($id);
        return response()->json(['messages' => $data], 200);
    }

    public function update(Request $request)
    {
        $this->messageRepository->create($request);
        return redirect()->back();
     }

    public function destroy($id)
    {
        $this->messageRepository->delete($id);
        return response()->json("Başarılı",  Response::HTTP_OK);
    }
    public function read($id)
    {
        $this->messageRepository->read($id);
        return response()->json(['success' => 'İştem Tamamlandı!'], 200);
    }
}
