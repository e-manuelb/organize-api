<?php

namespace App\Domains\User\Subdomains\Auth\Services;

use App\Domains\User\Subdomains\Auth\Models\User;
use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\AuthRepositoryInterface;
use App\Domains\User\Subdomains\Auth\Services\Interfaces\AuthServiceInterface;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    /**
     * @throws AuthenticationException
     */
    public function login(array $data): ?string
    {
        $user = (new User())->where('email', $data['email'])->first();

        $this->checkCredentials($data, $user);

        return $this->authRepository->createToken($user);
    }

    /**
     * @throws AuthenticationException
     */
    protected function checkCredentials(array $data, User $user): void
    {
        if (!$user) {
            throw new AuthenticationException('User is not registered in our database.');
        }

        if (!Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException('The given data was invalid.');
        }
    }
}
