<?php

namespace App\Application\UseCases;

use App\Domain\Repository\CarRepositoryInterface;
use App\Domain\Model\Car;
use DateTime;

class AddCar
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function execute(array $data)
    {
        if (!isset($data['mark']) || !isset($data['model']) || !isset($data['description']) || 
            !isset($data['country']) || !isset($data['city']) || !isset($data['year']) || !isset($data['enabled'])
        ) {
            return ['message' => 'expecting mandatory attributes'];
        }

        $filename = $data['filename'] ?? 'no filename set';

        $car = new Car();
        $car->setMark($data['mark']);
        $car->setModel($data['model']);
        $car->setDescription($data['description']);
        $car->setSlug(uniqid());
        $car->setCountry($data['country']);
        $car->setCity($data['city']);
        $car->setImageFilename($filename);
        $car->setYear($data['year']);
        $car->setEnabled(false);
        $car->setCreatedAt(DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));

        $this->carRepository->save($car);

        return ['status' => 'car created!'];
    }
}
