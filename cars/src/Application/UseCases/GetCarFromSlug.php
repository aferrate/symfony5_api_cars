<?php

namespace App\Application\UseCases;

use App\Domain\Repository\CarRepositoryInterface;

class GetCarFromSlug
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(string $slug)
    {
        $car = $this->carRepository->findBySlug($slug);

        if(is_null($car)) {
            return ['message' => 'no car found'];
        }

        $result = $car->returnArrayCar($car);

        return $result;
    }
}
