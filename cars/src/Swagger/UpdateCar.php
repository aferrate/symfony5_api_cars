<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\RequestBody(
 *      request="UpdateCar",
 *      required=true,
 *      @OA\JsonContent(
 *          @OA\Property(type="string", property="mark"),
 *          @OA\Property(type="string", property="model"),
 *          @OA\Property(type="string", property="description"),
 *          @OA\Property(type="string", property="slug"),
 *          @OA\Property(type="string", property="country"),
 *          @OA\Property(type="string", property="city"),
 *          @OA\Property(type="integer", property="year"),
 *          @OA\Property(type="boolean", property="enabled")
 *      )
 * )
 */
class UpdateCar
{}
