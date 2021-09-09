<?php

namespace App\Controller;

use App\Application\UseCases\AddCar;
use App\Application\UseCases\DeleteCar;
use App\Application\UseCases\GetAll;
use App\Application\UseCases\GetAllEnabled;
use App\Application\UseCases\GetCarFromId;
use App\Application\UseCases\GetCarFromSlug;
use App\Application\UseCases\UpdateCar;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PetController
 * @package App\Controller
 *
 * @Route(path="/api/v1/")
 */
class CarController
{
    /**
     * @Route("car/slug/{slug}", name="get_car_slug", methods={"GET"})
     */
    public function getCarFromSlug(string $slug, GetCarFromSlug $getCarFromSlug): JsonResponse
    {
        $result = $getCarFromSlug->execute($slug);

        return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * @Route("car/create", name="add_car", methods={"POST"})
     */
    public function addCar(Request $request, AddCar $addCar): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $result = $addCar->execute($data);

        return new JsonResponse($result, Response::HTTP_CREATED);
    }

    /**
     * @Route("car/update/{id}", name="update_car", methods={"PUT"})
     */
    public function updateCar(int $id, Request $request, UpdateCar $updateCar): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $result = $updateCar->execute($id, $data);

		return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * @Route("car/delete/{id}", name="delete_car", methods={"DELETE"})
     */
    public function deleteCar(int $id, DeleteCar $deleteCar): JsonResponse
    {
        $result = $deleteCar->execute($id);

        return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * @Route("cars/enabled", name="get_all_cars_enabled", methods={"GET"})
     */
    public function getAllEnabled(GetAllEnabled $getAllEnabled): JsonResponse
    {
        $result = $getAllEnabled->execute();

        return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * @Route("cars", name="get_all_cars", methods={"GET"})
     */
    public function getAll(GetAll $getAll): JsonResponse
    {
        $result = $getAll->execute();

        return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * @Route("car/id/{id}", name="get_car_id", methods={"GET"})
     */
    public function getCarFromId(int $id, GetCarFromId $getCarFromId): JsonResponse
    {
        $result = $getCarFromId->execute($id);

        return new JsonResponse($result, Response::HTTP_OK);
    }
}
