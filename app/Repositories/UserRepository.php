<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function all()
    {
        return User::all();
    }

    public function create(array $data)
    {
        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::findOrFail($id);
        if(isset($data['password'])){
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
        return $user;
    }
    public function detele($id)
    {
        return User::destroy($id);
    }
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}
