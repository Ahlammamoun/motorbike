<?php

namespace App\Controller\Back;

use App\Entity\MotorBike;
use App\Form\MotorBike1Type;
use App\Repository\MotorBikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/motor/bike")
 */
class MotorBikeController extends AbstractController
{
    /**
     * @Route("/", name="app_back_motor_bike_index", methods={"GET"})
     */
    public function index(MotorBikeRepository $motorBikeRepository): Response
    {
        return $this->render('back/motor_bike/index.html.twig', [
            'motor_bikes' => $motorBikeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_motor_bike_new", methods={"GET", "POST"})
     */
    public function new(Request $request, MotorBikeRepository $motorBikeRepository): Response
    {
        $motorBike = new MotorBike();
        $form = $this->createForm(MotorBike1Type::class, $motorBike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $motorBikeRepository->add($motorBike, true);

            return $this->redirectToRoute('app_back_motor_bike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/motor_bike/new.html.twig', [
            'motor_bike' => $motorBike,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_motor_bike_show", methods={"GET"})
     */
    public function show(MotorBike $motorBike): Response
    {
        return $this->render('back/motor_bike/show.html.twig', [
            'motor_bike' => $motorBike,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_motor_bike_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, MotorBike $motorBike, MotorBikeRepository $motorBikeRepository): Response
    {
        $form = $this->createForm(MotorBike1Type::class, $motorBike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $motorBikeRepository->add($motorBike, true);

            return $this->redirectToRoute('app_back_motor_bike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/motor_bike/edit.html.twig', [
            'motor_bike' => $motorBike,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_motor_bike_delete", methods={"POST"})
     */
    public function delete(Request $request, MotorBike $motorBike, MotorBikeRepository $motorBikeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$motorBike->getId(), $request->request->get('_token'))) {
            $motorBikeRepository->remove($motorBike, true);
        }

        return $this->redirectToRoute('app_back_motor_bike_index', [], Response::HTTP_SEE_OTHER);
    }
}
