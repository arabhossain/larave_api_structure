<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthServices
{
    /**
     * @param $data
     * @return mixed
     */
    public function register($data)
    {
        $user  = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'] ?? null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->token = $this->createToken($user);
        return $user;
    }

    /**
     * @param $data
     * @return false
     */
    public function login($data)
    {
       $user =  User::where('email', $data['email'])->first();
       if (!$user || !Hash::check($data['password'], $user->password))
          return false;

       $user->token = $this->createToken($user);

       return $user;
    }

    /**
     * @param $user
     * @param array $abilities
     * @return mixed
     */
    private function createToken($user, $abilities = [])
    {
        return $user->createToken('registration_token', $abilities)->plainTextToken;
    }
}
