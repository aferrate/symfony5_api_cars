<?php

namespace App\Tests\Feature;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CarControllerTest extends WebTestCase
{
    protected $idCarCreated;
    protected $slug;

    private function login($client)
    {
        $userRepository = static::getContainer()->get(UserRepository::class);

        // retrieve the test user
        $testUser = $userRepository->findOneByEmail('test@test.com');

        // simulate $testUser being logged in
        $client->loginUser($testUser);
    }
    
    public function testGetAllCars()
    {
        $client = static::createClient();

        $this->login($client);
    
        $client->request('GET', '/api/v1/cars');

        $this->assertResponseIsSuccessful();
    }

    public function testCreateCar()
    {
        $client = static::createClient();

        $this->login($client);
        
        $client->request('POST', '/api/v1/car/create', [], [], ['CONTENT_TYPE' => 'application/json'],
            '{
                "mark" : "test api",
                "model" : "test api",
                "description" : "test api",
                "country" : "test api",
                "city" : "test api",
                "year" : 2002,
                "enabled" : false
            }'
        );

        $this->assertResponseIsSuccessful();
    }

    public function testGetAllEnabledCars()
    {
        $client = static::createClient();

        $this->login($client);
    
        $client->request('GET', '/api/v1/cars/enabled');

        $this->assertResponseIsSuccessful();
    }
}
