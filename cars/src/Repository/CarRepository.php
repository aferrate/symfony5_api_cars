<?php

namespace App\Repository;

use App\Domain\Model\Car;
use App\Domain\Repository\CarRepositoryInterface;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;

final class CarRepository implements CarRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findBySlug(string $slug): ?Car
    {
        return $this->entityManager->getRepository(Car::class)->findOneBy(['slug' => $slug]);
    }

    public function save(Car $car): void
    {
        $this->entityManager->persist($car);
        $this->entityManager->flush();
    }

    public function delete(Car $car): void
    {
        $this->entityManager->remove($car);
        $this->entityManager->flush();
    }

    public function findAllEnabled(): array
    {
        $qb = $this->entityManager->createQueryBuilder();

        $cars = $qb->select('c')
            ->from('App:Car', 'c')
            ->where('c.enabled = TRUE')
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult(AbstractQuery::HYDRATE_OBJECT)
        ;

        return $cars;
    }

    public function findAll(): array
    {
        return $this->entityManager->getRepository(Car::class)->findAll();
    }

    public function findOneById(int $id): ?Car
    {
        return $this->entityManager->getRepository(Car::class)->findOneBy(['id' => $id]);
    }
}
