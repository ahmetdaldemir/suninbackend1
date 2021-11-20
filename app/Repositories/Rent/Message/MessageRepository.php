<?php namespace App\Repositories\Rent\Message;

use App\Models\Message;


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

    public function create(object $data)
    {
        Message::save($data);
    }

    public function update(object $data)
    {
        Message::find($id)->update($data);
    }
}
