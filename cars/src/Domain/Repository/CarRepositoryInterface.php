<?php

namespace App\Domain\Repository;

use App\Domain\Model\Car;

interface CarRepositoryInterface
{
    public function findBySlug(string $slug): ?Car;
    public function save(Car $car): void;
    public function delete(Car $car): void;
    public function findAllEnabled(): array;
    public function findAll(): array;
    public function findOneById(int $id): ?Car;
}
