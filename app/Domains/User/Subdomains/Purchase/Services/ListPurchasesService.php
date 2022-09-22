<?php

namespace App\Domains\User\Subdomains\Purchase\Services;

use App\Domains\User\Subdomains\Purchase\Repositories\Interfaces\ListPurchasesRepositoryInterface;
use App\Domains\User\Subdomains\Purchase\Services\Interfaces\ListPurchasesServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ListPurchasesService implements ListPurchasesServiceInterface
{

    protected ListPurchasesRepositoryInterface $listPurchasesRepository;

    public function __construct(ListPurchasesRepositoryInterface $listPurchasesRepository)
    {
        $this->listPurchasesRepository = $listPurchasesRepository;
    }

    public function handle(int $id): Collection
    {
        return $this->listPurchasesRepository->list($id);
    }
}
