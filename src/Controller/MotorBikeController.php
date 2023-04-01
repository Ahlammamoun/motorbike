<?php

namespace App\Controller;

use App\Entity\MotorBike;
use App\Form\MotorBikeType;
use App\Repository\MotorBikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/motor/bike")
 */
class MotorBikeController extends AbstractController
{
    /**
     * @Route("/", name="app_motor_bike_index", methods={"GET"})
     */
    public function index(MotorBikeRepository $motorBikeRepository): Response
    {
        return $this->render('motor_bike/index.html.twig', [
            'motor_bikes' => $motorBikeRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}", name="app_motor_bike_show", methods={"GET"})
     */
    public function show(MotorBike $motorBike): Response
    {
        return $this->render('motor_bike/show.html.twig', [
            'motor_bike' => $motorBike,
        ]);
    }


}
