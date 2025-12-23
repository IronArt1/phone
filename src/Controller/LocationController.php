<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LocationController extends AbstractController
{
    const MOCK_PHONE_MYSQL_TABLE = [
        30 => [59 => '430-56-71'], // St.Petersburg
        37 => [55 => '123-16-92'], // Moscow
    ];

    #[Route('/location', name: 'app_location', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('location/index.html.twig', []);
    }

    #[Route('/phone/{latitude}/{longitude}', name: 'app_phone', methods: ['GET'])]
    public function getPhone(int $latitude, int $longitude): JsonResponse
    {
        error_log($latitude);
        error_log($longitude);
        if (isset(self::MOCK_PHONE_MYSQL_TABLE[$latitude][$longitude])) {
            $data = self::MOCK_PHONE_MYSQL_TABLE[$latitude][$longitude];
        } else {
            $data = 'there is no such city';
        }

        return $this->json($data);
    }
}
