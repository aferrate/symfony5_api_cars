<?php

namespace App\Application\UseCases;

use App\Domain\Repository\CarRepositoryInterface;
use DateTime;

class UpdateCar
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(int $id, array $data)
    {
        $car = $this->carRepository->findOneById($id);

        if(is_null($car)) {
            return ['message' => 'no car found'];
        }

        !isset($data['mark']) ? true : $car->setMark($data['mark']);
        !isset($data['model']) ? true : $car->setModel($data['model']);
        !isset($data['description']) ? true : $car->setDescription($data['description']);
        !isset($data['country']) ? true : $car->setCountry($data['country']);
        !isset($data['city']) ? true : $car->setCity($data['city']);
        !isset($data['filename']) ? true : $car->setImageFilename($data['filename']);
        !isset($data['year']) ? true : $car->setYear($data['year']);
        !isset($data['enabled']) ? true : $car->setEnabled($data['enabled']);

        $car->setUpdatedAt(DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));

        $this->carRepository->save($car);

        return ['status' => 'car updated!'];
    }
}
