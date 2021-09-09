<?php

namespace App\Application\UseCases;

use App\Domain\Repository\CarRepositoryInterface;

class GetAllEnabled
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute()
    {
        $cars = $this->carRepository->findAllEnabled();
        $data = [];

        foreach ($cars as $car) {
            $data[] = $car->returnArrayCar($car);
        }

        return $data;
    }
}
