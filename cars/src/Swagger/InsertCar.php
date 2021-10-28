<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\RequestBody(
 *      request="InsertCar",
 *      required=true,
 *      @OA\JsonContent(
 *          required={"mark", "model", "description", "slug", "country", "city", "year", "enabled"},
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
class InsertCar
{}
