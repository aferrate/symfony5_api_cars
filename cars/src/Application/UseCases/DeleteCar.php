<?php

namespace App\Application\UseCases;

use App\Domain\Repository\CarRepositoryInterface;

class DeleteCar
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $id)
    {
        $car = $this->carRepository->findOneById($id);

        if(is_null($car)) {
            return ['message' => 'no car found'];
        }

        $this->carRepository->delete($car);

        return ['status' => 'car deleted'];
    }
}
