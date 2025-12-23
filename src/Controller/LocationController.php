<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LocationController extends AbstractController
{
    const MOCK_PHONE_MYSQL_TABLE = [
        'St Petersburg' => '430-56-71',
        'Moscow' => '123-16-92',
    ];

    #[Route('/location', name: 'app_location', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('location/index.html.twig', []);
    }

    #[Route('/phone/{name}', name: 'app_phone', methods: ['GET'])]
    public function getPhone($name): JsonResponse
    {
        return $this->json(self::MOCK_PHONE_MYSQL_TABLE[$name]);
    }
}
