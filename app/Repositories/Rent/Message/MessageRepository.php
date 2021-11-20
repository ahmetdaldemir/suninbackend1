<?php namespace App\Repositories\Rent\Message;

use App\Models\Message;
use Illuminate\Support\Str;


class MessageRepository implements MessageRepositoryInterface
{

    public function get($id)
    {
        return Message::find($id);
    }

    public function all()
    {
        return Message::all();
    }

    public function delete($id)
    {
        Message::destroy($id);
    }

    public function read($id)
    {
        $blog = Message::find($id);
        $blog->is_read = 1;
        $blog->save();
    }

    public function create(object $data)
    {
        Message::save($data);
    }

    public function update(object $data)
    {
        Message::find($id)->update($data);
    }
}
