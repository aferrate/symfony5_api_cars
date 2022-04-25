<?php

namespace App\GraphQL\Resolver;

use App\Domain\Model\Car;
use App\Domain\Repository\CarReadRepositoryInterface;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

final class CarResolver implements AliasedInterface, ResolverInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAllEnabled(Argument $args): array
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

    public function findAll(Argument $args): array
    {
        return $this->entityManager->getRepository(Car::class)->findAll();
    }

    public function findOneById(Argument $args): ?Car
    {
        return $this->entityManager->getRepository(Car::class)->findOneBy(['id' => $args['id']]);
    }

    public function findBySlug(Argument $args): ?Car
    {
        return $this->entityManager->getRepository(Car::class)->findOneBy(['slug' => $args['slug']]);
    }

    public static function getAliases(): array
    {
        return [
            'findAll' => 'all_cars',
            'findAllEnabled' => 'all_cars_enabled',
            'findOneById' => 'car_from_id',
            'findBySlug' => 'car_from_slug'
        ];
    }
}
