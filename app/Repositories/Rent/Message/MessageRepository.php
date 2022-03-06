<?php namespace App\Repositories\Rent\Message;

use App\Models\Message;
use Illuminate\Support\Str;


class MessageRepository implements MessageRepositoryInterface
{

    public function get($id)
    {
        return Message::where('reply',$id)->get();
    }

    public function all()
    {
        $session = session()->get('rent_session');
        return Message::where('reply','0')->where('tenant_id',"67667cb9-3933-40ab-b248-02a7f819f870")->get();
    }

    public function delete($id)
    {
        Message::destroy($id);
    }

    public function read($id)
    {
        $result = Message::find($id);
        $result->is_read = 1;
        $result->save();
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $result = new Message();
        $result->id = Str::uuid()->toString();
        $result->reply = $data->id;
        $result->fullName = $session['name'];
        $result->email = $session['email'];
        $result->phone = '';
        $result->comment = $data->comment;
        $result->is_read = 1;
        $result->tenant_id = "67667cb9-3933-40ab-b248-02a7f819f870";
        $result->save();
    }

    public function update(object $data)
    {
        Message::find($id)->update($data);
    }
}
