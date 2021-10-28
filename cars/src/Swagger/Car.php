<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class Car
{
    /**
     * @OA\Property(type="integer")
     * @var int
     */
    public $id;
    /**
     * @OA\Property(type="string")
     * @var string
     */
    public $mark;
    /**
     * @OA\Property(type="string")
     * @var string
     */
    public $model;
    /**
     * @OA\Property(type="string")
     * @var string
     */
    public $description;
    /**
     * @OA\Property(type="string")
     * @var string
     */
    public $slug;
    /**
     * @OA\Property(type="string")
     * @var string
     */
    public $country;
    /**
     * @OA\Property(type="string")
     * @var string
     */
    public $city;
    /**
     * @OA\Property(type="integer")
     * @var int
     */
    public $year;
    /**
     * @OA\Property(type="boolean")
     * @var bool
     */
    public $enabled;
    /**
     * @OA\Property(type="string", format="date-time")
     * @var \DateTimeInterface
     * 
     */
    public $createdAt;
    /**
     * @OA\Property(type="string", format="date-time", nullable=true)
     * @var \DateTimeInterface|null
     */
    public $updatedAt;
}
