<?php


namespace App\Repositories\Session;


use App\Repositories\Contracts\BasketRepositoryContract;
use Illuminate\Contracts\Session\Session;

class BasketRepository implements BasketRepositoryContract
{
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


    public function all(): array
    {
        return $this->session->get('basket', []);
    }


    public function add(int $id, int $qty, array $atts = null): void
    {
        $this->session->put($this->identity($id), ['qty' => $qty, 'attributes' => $atts]);
    }


    private function identity(int $id): string
    {
        return 'basket.'.$id;
    }


    private function countyIdentity(): string
    {
        return 'county';
    }

    private function townIdentity(): string
    {
        return 'town';
    }

    private function postcodeIdentity(): string
    {
        return 'postcode';
    }


    public function getCurrentQty(int $id): int
    {
        $i = $this->session->get($this->identity($id));
        return $i['qty'] ?? 0;
    }


    public function remove(int $id): void
    {
        $this->session->remove($this->identity($id));
    }


    public function addCounty(int $id): void
    {
        $this->session->put($this->countyIdentity(), $id);
    }

    public function addTown($town): void
    {
        $this->session->put($this->townIdentity(), $town);
    }

    public function addPostcode($postcode): void
    {
        $this->session->put($this->postcodeIdentity(), $postcode);
    }

    public function allQuantities(int $id): int
    {
        dd($this->session->get('basket'));
        return $this->session->get('basket', []);
    }

    public function get(int $id): array
    {
        return $this->session->get($this->identity($id), []);
    }

    public function forget(): void
    {
        $this->session->flush();
    }
}
