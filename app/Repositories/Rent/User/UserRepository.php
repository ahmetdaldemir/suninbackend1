<?php namespace App\Repositories\Rent\User;

use App\Models\User;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface
{
    protected $session;
    public function __construct()
    {
        $this->session = session()->get('rent_session');
    }

    public function get($id)
    {
        $data = [];
        $results = User::find($id);
             $data = array(
                'id' => $results->id,
                'name' => $results->name,
                'role_id' => $results->role_id,
                'email' => $results->email,
            );
         return $data;
    }

    public function all()
    {
        $session = session()->get('rent_session');
        $data = [];
        $results = User::where('tenant_id', $session['tenant_id'])->get();
        foreach ($results as $result) {
            $data[] = array(
                'id' => $result->id,
                'name' => $result->name,
                'role_id' => $results->role_id,
                'email' => $result->email
            );
        }
        return $data;
    }

    public function delete($id)
    {
        User::destroy($id);
    }

    public function create(object $data)
    {
        $session = session()->get('rent_session');
        $id = Str::uuid()->toString();
        $result = new User();
        $result->id = $id;
        $result->name = $data->name;
        $result->password = $data->password;
        $result->email = $data->email;
        $result->tenant_id = $session['tenant_id'];
        $result->save();
    }

    public function update(object $data)
    {
        $blog = User::find($data->blog_id);
        $blog->image = $image;
        $blog->save();
    }
}
