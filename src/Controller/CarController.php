<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasicCarController extends AbstractController
{
    public function __construct(private CarRepository $carRepo)
    {
    }

        // CRUD OPERATIONS //
        
        // Create a new car
        // Read an existing car
        // Read all existing cars
        // Update an existing car
        // Delete an existing car
}