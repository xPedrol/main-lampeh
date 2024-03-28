<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class MyAuthProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        return User::where('email', $identifier)->first();
    }

    public function retrieveByToken($identifier, $token): null
    {
        return null;
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
    }

    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            if ($user->password == sha1($credentials['password'])) {
                return $user;
            }
        }
        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $user = User::where('email', $credentials['email'])->first();
        if ($user) {
            if ($user->password == sha1($credentials['password'])) {
                return true;
            }
        }
        return false;
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false)
    {
        // TODO: Implement rehashPasswordIfRequired() method.
    }
}
