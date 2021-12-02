<?php
namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use App\Repositories\Rent\Comment\CommentRepositoryInterface;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index(Request $request)
    {
        $data['comments'] = $this->commentRepository->all();
        return view('rent/comment/list',$data);
    }

    public function status(Request $request)
    {
        $this->commentRepository->update($request);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->commentRepository->delete($id);
        response()->json("Başarılı",  Response::HTTP_NO_CONTENT);
        return redirect()->back();
    }
}
