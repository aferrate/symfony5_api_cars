<?php

namespace App\Domain\Model;

use DateTime;

final class Car
{
    private $id;
    private $mark;
    private $model;
    private $description;
    private $slug;
    private $country;
    private $city;
    private $imageFilename;
    private $year;
    private $enabled;
    private $createdAt;
    private $updatedAt;
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMark(): string
    {
        return $this->mark;
    }

    /**
     * @param string $mark
     */
    public function setMark(string $mark): void
    {
        $this->mark = $mark;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getImageFilename(): string
    {
        return $this->imageFilename;
    }

    /**
     * @param string $imageFilename
     */
    public function setImageFilename(string $imageFilename): void
    {
        $this->imageFilename = $imageFilename;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    /**
     * @return bool
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return array
     */
    public function returnArrayCar(Car $car): array
    {
        $data[] = [
            'id' => $car->getId(),
            'mark' => $car->getMark(),
            'model' => $car->getModel(),
            'description' => $car->getDescription(),
            'slug' => $car->getSlug(),
            'country' => $car->getCountry(),
            'city' => $car->getCity(),
            'imageFilename' => $car->getImageFilename(),
            'year' => $car->getYear(),
            'enabled' => $car->getEnabled(),
            'createdAt' => $car->getCreatedAt(),
            'updatedAt' => $car->getUpdatedAt()
        ];

        return $data;
    }
}
