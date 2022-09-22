<?php

namespace App\Domains\User\Subdomains\Auth\Services;

use App\Domains\User\Subdomains\Auth\Models\User;
use App\Domains\User\Subdomains\Auth\Repositories\Interfaces\LoginRepositoryInterface;
use App\Domains\User\Subdomains\Auth\Services\Interfaces\LoginServiceInterface;
use Illuminate\Auth\AuthenticationException;

class LoginService implements LoginServiceInterface
{
    protected LoginRepositoryInterface $loginRepository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    /**
     * @throws AuthenticationException
     */
    public function handle(array $data): ?string
    {
        $user = (new User())->where('email', '=', $data['email'])->first();

        $this->checkCredentials();

        return $this->loginRepository->login($user);
    }

    /**
     * @throws AuthenticationException
     */
    protected function checkCredentials(): void
    {
        $credentials = request(['email', 'password']);

        if (!auth()->attempt($credentials)) {
            throw new AuthenticationException('The given data was invalid.');
        }
    }
}
