<?php

namespace App\Domains\Admin\Subdomains\User\Repositories;

use App\Domains\Admin\Subdomains\User\Models\User;
use App\Domains\Admin\Subdomains\User\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

class UserRepository implements UserRepositoryInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data): User
    {
        return $this->user->create($data);
    }

    public function list(SupportCollection $params): Collection
    {
        return $this
            ->user
            ->when($params->has('user_id'), function ($query) use ($params) {
                if (is_array($params->value('user_id'))) {
                    return $query->whereIn('id', $params->value('user_id'));
                } else {
                    return $query->where('id', $params->value('user_id'));
                }
            })
            ->when($params->has('first_name'), function ($query) use ($params) {
                if (is_array($params['first_name'])) {
                    return $query->whereIn('first_name', $params['first_name']);
                } else {
                    return $query->where('first_name', $params['first_name']);
                }
            })
            ->when($params->has('middle_name'), function ($query) use ($params) {
                if (is_array($params['middle_name'])) {
                    return $query->whereIn('middle_name', $params['middle_name']);
                } else {
                    return $query->where('middle_name', $params['middle_name']);
                }
            })
            ->when($params->has('last_name'), function ($query) use ($params) {
                if (is_array($params['last_name'])) {
                    return $query->whereIn('last_name', $params['last_name']);
                } else {
                    return $query->where('last_name', $params['last_name']);
                }
            })
            ->when($params->has('email'), function ($query) use ($params) {
                if (is_array($params['email'])) {
                    return $query->whereIn('email', $params['email']);
                } else {
                    return $query->where('email', $params['email']);
                }
            })
            ->when($params->has('role_id'), function ($query) use ($params) {
                if (is_array($params['role_id'])) {
                    return $query->whereIn('role_id', $params['role_id']);
                } else {
                    return $query->where('role_id', $params['role_id']);
                }
            })
            ->get();
    }

    public function paginate(SupportCollection $params)
    {

    }

    public function getByID(int $id): User
    {
        return $this->user->findOrFail($id);
    }

    public function update(array $data, int $id): User
    {
        $user = (new User())->findOrFail($id);

        $user->update($data);

        return $user;
    }

    public function delete(int $id): void
    {
        $this->user->findOrFail($id)->delete();
    }
}
