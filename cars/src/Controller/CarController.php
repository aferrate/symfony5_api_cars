<?php

namespace App\Controller;

use App\Domain\Model\Car;
use App\Domain\Repository\CarRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

/**
 * Class PetController
 * @package App\Controller
 *
 * @Route(path="/api/v1/")
 */
class CarController
{
    private $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @Route("car/slug/{slug}", name="get_car_slug", methods={"GET"})
     */
    public function getCarFromSlug(string $slug): JsonResponse
    {
        $car = $this->carRepository->findBySlug($slug);

        if(is_null($car)) {
            return new JsonResponse(['message' => 'no car found'], Response::HTTP_OK);
        }

        $data = $car->returnArrayCar($car);

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("car/create", name="add_car", methods={"POST"})
     */
    public function addCar(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['mark']) || !isset($data['model']) || !isset($data['description']) || 
            !isset($data['country']) || !isset($data['city']) || !isset($data['year']) || !isset($data['enabled'])
        ) {
            return new JsonResponse(['message' => 'expecting mandatory attributes'], Response::HTTP_OK);
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

        return new JsonResponse(['status' => 'car created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("car/update/{id}", name="update_car", methods={"PUT"})
     */
    public function updateCar(int $id, Request $request): JsonResponse
    {
        $car = $this->carRepository->findOneById($id);

        if(is_null($car)) {
            return new JsonResponse(['message' => 'no car found'], Response::HTTP_OK);
        }

        $data = json_decode($request->getContent(), true);

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

		return new JsonResponse(['status' => 'car updated!'], Response::HTTP_OK);
    }

    /**
     * @Route("car/delete/{id}", name="delete_car", methods={"DELETE"})
     */
    public function delete(int $id): JsonResponse
    {
        $car = $this->carRepository->findOneById($id);

        if(is_null($car)) {
            return new JsonResponse(['message' => 'no car found'], Response::HTTP_OK);
        }

        $this->carRepository->delete($car);

        return new JsonResponse(['status' => 'car deleted'], Response::HTTP_OK);
    }

    /**
     * @Route("cars/enabled", name="get_all_cars_enabled", methods={"GET"})
     */
    public function getAllEnabled(): JsonResponse
    {
        $cars = $this->carRepository->findAllEnabled();
        $data = [];

        foreach ($cars as $car) {
            $data[] = $car->returnArrayCar($car);
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("cars", name="get_all_cars", methods={"GET"})
     */
    public function getAll(): JsonResponse
    {
        $cars = $this->carRepository->findAll();
        $data = [];

        foreach ($cars as $car) {
            $data[] = $car->returnArrayCar($car);
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("car/id/{id}", name="get_car_id", methods={"GET"})
     */
    public function getCarFromId(int $id): JsonResponse
    {
        $car = $this->carRepository->findOneById($id);

        if(is_null($car)) {
            return new JsonResponse(['message' => 'no car found'], Response::HTTP_OK);
        }

        $data = $car->returnArrayCar($car);

        return new JsonResponse($data, Response::HTTP_OK);
    }
}
