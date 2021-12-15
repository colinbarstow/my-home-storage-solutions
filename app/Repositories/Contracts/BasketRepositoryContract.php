<?php


namespace App\Repositories\Contracts;


interface BasketRepositoryContract
{
    public function all(): array;

    public function get(int $id): array;

    public function add(int $id, int $qty, array $atts): void;

    public function getCurrentQty(int $id): int;

    public function allQuantities(int $id): int;

    public function remove(int $id): void;

    public function addCounty(int $id): void;

    public function addTown(int $id): void;

    public function addPostcode(int $id): void;

    public function forget(): void;
}
