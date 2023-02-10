<?php

namespace App\Controller;


use App\Repository\MotorBikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\MotorBike;
use App\Form\MotorBikeType;
use Doctrine\ORM\EntityManagerInterface;



class MotorBikeController extends AbstractController
{
    /**
     * @Route("/", name="app_motor_bike")
     */
    public function index(MotorBikeRepository $MotorBikeRepo): Response
    {

        $motorBikes = $MotorBikeRepo->findAll();
        //dd($cars);
        return $this->render('motor_bike/index.html.twig', [
            'motorBikes' => $motorBikes ,
        ]);

    }

  /**
     * @Route("/motorbike/{id}", name="app_motorbike", requirements={"id": "\d+"})
     */

    
    public function show(MotorBikeRepository $MotorBikeRepo, int $id ): Response
    {
        $motorbike = $MotorBikeRepo->find($id);
  
     
       
        //$lastReview = $reviewRepository->findBy(['Movie' => $Movie], ['id' => 'DESC'], 1);
       // dd($lastReviews);

        return $this->render('motor_bike/show.html.twig', [
          
            'motorbike' => $motorbike ,

            
        ]);
            
    }




















    /**
     * @Route("/motorbike", name="app_motor_bike_create", methods={"GET","POST"})
     */
    public function create(Request $request, EntityManagerInterface $doctrine): Response
    {
        $motorBike = new MotorBike();
        $formulaire = $this->createForm(MotorBikeType::class, $motorBike);


        $formulaire->handleRequest($request);
        if ($formulaire->isSubmitted() && $formulaire->isValid()){

            $doctrine->persist($motorBike);
            $doctrine->flush();
            //dd($motorBike);

            return $this->redirectToRoute("app_motor_bike");



        }

        //dd($cars);
        return $this->renderForm('motor_bike/create.html.twig', [
            'form' => $formulaire ,
        ]);
    }











}
