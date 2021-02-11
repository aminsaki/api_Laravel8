<?php


namespace App\Respostroy;


use App\Models\User;
use Illuminate\Http\Client\Request;

class UserRespostroy  implements InterfaceUser
{
    public function all()
    {
        return User::limit('15')->get();
    }
    public function create($request)
    {
        return  User::firstOrCreate(
            ['name' => Request('name')],
            ['email' => Request('email'), 'password' => Request('password')]
        );
    }
    public function delete($id)
    {
        return  User::findOrFail($id)->delete();
    }
    public function show($id)
    {
        return  User::findOrFail($id);
    }
    public function update($request)
    {
       return  User::updateOrCreate(
            ['id' => Request('id')],
            ['name' => Request('name'), 'email' => Request('email'), 'password' => Request('password')]
        );
    }
}